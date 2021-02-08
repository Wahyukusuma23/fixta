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
    public function index()
    {
        $imps = TbImp::where('nik', auth('kary')->user()->nik)->get();
        return view('kary_dashboard', compact('imps'));
    }
    public function form_imp()
    {
        $list_ijins = TbIjin::get();
        return view('form', compact('list_ijins'));
    }
    public function form_imp_post(Request $request)
    {
        $validatedData = $request->validate([
            'tgl_ijin' => ['required', 'max:255', 'unique:App\Models\TbKaryawan,nik'],
            'lama_ijin' => ['required', 'numeric'],
            'kode_ijin' => ['required'],
            'alasan' => ['required','max:500']
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

        dd($request->all());
    }
    public function line_leader()
    {
        // dd('hai');
        $listln = TbLine::where('line_leader',auth('kary')->user()->nik)->pluck('nama')->toArray();
        $lists = TbImp::whereHas('karyawan', function (Builder $query) use ($listln) {
            return $query->whereIn('line_kav', $listln);
        })->orderBy('created_at','desc')->get();
        return view('admin', compact('lists'));
    }
    public function supervisor()
    {
        $listln = TbLine::where('spv',auth('kary')->user()->nik)->pluck('nama')->toArray();
        $lists = TbImp::whereHas('karyawan', function (Builder $query) use ($listln) {
            return $query->whereIn('line_kav',$listln);
        })->where('approve_ll','!=',null)->get();
        return view('admin', compact('lists'));
    }
    public function human_resources()
    {
        $lists = TbImp::orderBy('created_at', 'desc')->get();
        // dd('lhalo hrd');
        return view('hrd', compact('lists'));
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
}
?>
