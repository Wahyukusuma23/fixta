<?php

namespace App\Http\Controllers;

use App\Models\TbIjin;
use App\Models\TbImp;
use App\Models\TbKaryawan;
use App\Models\TbLine;
use App\User;
use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;

class KaryawanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:kary', ['except' => 'logout']);
    }
    public function index()
    {
        $imps = TbImp::where('nik', auth('kary')->user()->nik)->get();
        return view('kary_dashboard', compact('imps'));
    }
    public function form_imp()
    {
        if (auth('kary')->user()->posisi != 'operator') {
            return redirect()->route('home')->with('error', 'Pengajuan IMP Online hanya berlaku bagi karyawan golongan 1 dan magang');
        }
        $list_ijins = TbIjin::get();
        return view('form', compact('list_ijins'));
    }
    public function form_imp_post(Request $request)
    {
        $validatedData = $request->validate([
            'tgl_ijin' => ['required'],
            'lama_ijin' => ['required', 'numeric','min:1'],
            'kode_ijin' => ['required'],
            'alasan' => ['required','max:100']
        ]);
        $add_user = TbImp::create([
            'nik' => auth('kary')->user()->nik,
            'tgl_ijin' => $request->tgl_ijin,
            'no_imp' => 'IMP'.auth('kary')->user()->nik.Carbon::now()->format('mdY'),
            'lama_ijin' => $request->lama_ijin,
            'id_ijin' => $request->kode_ijin,
            'alasan_ijin' => $request->alasan,
        ]);
        if ($add_user) {
            return redirect()->route('karyawan.index')->with('success', 'Pengajuan Ijin berhasil, menunggu konfirmasi atasan');
        } else {
            return redirect()->back()->with('error', 'terjadi kesalahan sistem');
        }
    }
    public function line_leader()
    {
        $listln = TbLine::where('line_leader',auth('kary')->user()->nik)->pluck('id')->toArray();
        $lists = TbImp::whereHas('karyawan', function (Builder $query) use ($listln) {
            return $query->whereIn('line_kav', $listln);
        })->orderBy('created_at','desc')->get();
        // dd($lists);
        return view('admin', compact('lists'));
    }
    public function supervisor()
    {
        $listln = TbLine::where('spv',auth('kary')->user()->nik)->pluck('id')->toArray();
        $lists = TbImp::whereHas('karyawan', function (Builder $query) use ($listln) {
            return $query->whereIn('line_kav',$listln);
        })->where('approve_ll','!=',null)->get();
        return view('admin', compact('lists'));
    }
    public function human_resources_option(Request $request)
    {
        if (auth('kary')->user()->posisi != 'human_resources') {
            return redirect()->route('home')->with('error', 'Autentikasi hanya tersedia bagi user tertentu');
        }
        if ($request->line == '') {
            if ($request->name == '') {
                if ($request->from == '' || $request->to == '') {
                    $lists=TbImp::paginate($request->limit?$request->limit:15);
                } else {
                    $lists=TbImp::when($request, function ($query) use ($request){
                    $query->where('created_at', '>', $request->from)
                            ->where('created_at', '<', $request->to)
                            ->orWhere('created_at', "like", "%$request->from%")
                            ->orWhere('created_at', "like", "%$request->to%");
                    })->paginate($request->limit?$request->limit:10);
                    $lists->appends($request->only('from', 'to', 'limit'));
                }
            }else {
                if ($request->from == '' || $request->to == '') {
                    $lists = TbImp::whereHas('karyawan', function ($query) use ($request) {
                        $query->where('nama', "like", "%$request->name%");
                    })->paginate($request->limit?$request->limit:10);
                } else {
                    $lists = TbImp::whereHas('karyawan', function ($query) use ($request) {
                        $query->where('nama', "like", "%$request->name%");
                    })->when($request, function ($query) use ($request){
                        $query->where('created_at', '>', $request->from)
                                ->where('created_at', '<', $request->to)
                                ->orWhere('created_at', "like", "%$request->from%")
                                ->orWhere('created_at', "like", "%$request->to%");
                        })->paginate($request->limit?$request->limit:10);
                }
                $lists->appends($request->only('from', 'to', 'name'));
            }
        } else {
            $lists = TbImp::whereHas('karyawan', function ($query) use ($request) {
                $query->where('line_kav', "like", "%$request->line%");
            })->paginate($request->limit?$request->limit:10);
        }
        $lines = TbLine::get();
        $data = [
            'from'=>$request->from,
            'to'=>$request->to,
            'name'=>$request->name,
            'lists'=>$lists,
            'lines'=>$lines,
            'linefr'=>$request->line
        ];
        return view('hrd', $data);
    }
    public function human_resources_report(Request $request)
    {
        if (auth('kary')->user()->posisi != 'human_resources') {
            return redirect()->route('home')->with('error', 'Autentikasi hanya tersedia bagi user tertentu');
        }
        if ($request->name == '') {
            if ($request->from == '' || $request->to == '') {
                $lists=TbImp::paginate($request->limit?$request->limit:10);
            } else {
                $lists=TbImp::when($request, function ($query) use ($request){
                $query->where('created_at', '>', $request->from)
                        ->where('created_at', '<', $request->to)
                        ->orWhere('created_at', "like", "%$request->from%")
                        ->orWhere('created_at', "like", "%$request->to%");
                })->paginate($request->limit?$request->limit:10);
                $lists->appends($request->only('from', 'to', 'limit'));
            }
        }else {
            if ($request->from == '' || $request->to == '') {
                $lists = TbImp::whereHas('karyawan', function ($query) use ($request) {
                    $query->where('nama', "like", "%$request->name%");
                })->paginate($request->limit?$request->limit:10);
            } else {
                $lists = TbImp::whereHas('karyawan', function ($query) use ($request) {
                    $query->where('nama', "like", "%$request->name%");
                })->when($request, function ($query) use ($request){
                    $query->where('created_at', '>', $request->from)
                            ->where('created_at', '<', $request->to)
                            ->orWhere('created_at', "like", "%$request->from%")
                            ->orWhere('created_at', "like", "%$request->to%");
                    })->paginate($request->limit?$request->limit:10);
            }

            $lists->appends($request->only('from', 'to', 'name'));
        }
        $i=1;
        foreach ($lists as $list) {
            $data[$i][0] = $i;
            $data[$i][1]=$list->created_at;
            $data[$i][2]=$list->no_imp;
            $data[$i][3]=$list->karyawan->nama;
            $data[$i][4]=$list->tgl_ijin;
            $data[$i][5]=$list->lama_ijin;
            $data[$i][6]=$list->ijin->id_ijin.' - '.$list->ijin->jenis_ijin;
            if (is_null($list->approve_ll)) {
                if (is_null($list->approve_spv)) {
                    $status = 'APPPROVE KOSONG';
                } else {
                    $status = 'LL KOSONG';
                }
            } else {
                if (is_null($list->approve_spv)) {
                    $status = 'SPV KOSONG';
                } else {
                    $status = 'LENGKAP';
                }
            }
            $data[$i][7]=$status;
            $i++;
        }
        $fileName         = "IMP_REPORT".date("dmY-hs").".xls";
        $headerRow        = array("Nomor","Tanggal Pengajuan","No. IMP","Nama Karyawan","Tanggal Ijin", "Lama Ijin","Jenis Ijin","Status");

        $this->ExportXls($fileName, $headerRow, $data);
    }
    public function human_resources()
    {
        if (auth('kary')->user()->posisi != 'human_resources') {
            return redirect()->route('home')->with('error', 'Autentikasi hanya tersedia bagi user tertentu');
        }
        $lists = TbImp::orderBy('created_at', 'desc')->paginate(10);
        $lines = TbLine::get();
        return view('hrd', compact('lists', 'lines'));
    }
    public function ll_accept(Request $request)
    {
        $pick_imp = TbImp::where('no_imp',$request->noimp)->first();
        try {
            if (auth('kary')->user()->posisi == 'line_leader') {
                $pick_imp->approve_ll = Carbon::now()->toDateTimeString();
            } else {
                $pick_imp->approve_spv = Carbon::now()->toDateTimeString();
            }
            $pick_imp->save();
            return 'ok';
        } catch (\Throwable $th) {
            return 'notok';
        }
    }
    protected function ExportXls($fileName, $headerRow, $data)
    {
        # fungsi untuk export XLS
        # increase max_execution_time to 10 min if data set is very large
        ini_set('max_execution_time', 1600);
        $fileContent = implode("\t ", $headerRow)."\n";
        foreach($data as $result) {
            $fileContent .=  implode("\t ", $result)."\n";
        }
        # you can set csv format
        header('Content-type: application/vnd-ms-excel');
        header('Content-Disposition: attachment; filename='.$fileName);
        echo $fileContent;
        exit;
    }
    public function list_line()
    {
        $list_lines = TbLine::orderBy('nama')->get();
        return view('line', compact('list_lines'));
        dd('hai');
    }
    public function list_line_post(Request $request)
    {
        dd($request->all());
    }
}
?>
