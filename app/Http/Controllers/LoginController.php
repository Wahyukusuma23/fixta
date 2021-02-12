<?php

namespace App\Http\Controllers;

use App\Models\TbImp;
use App\Models\TbKaryawan;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        return view('index');
    }
    public function logint(Request $request)
    {
        if (Auth::guard('kary')->attempt(['nik' => $request->nik, 'password' => $request->password])) {
            $nik = TbKaryawan::where('nik', $request->nik)->first();
            switch ($nik->posisi) {
                case 'operator':
                    return redirect()->intended(route('karyawan.index'));
                    break;
                case 'line_leader':
                    return redirect()->intended(route('line_leader'));
                    break;
                case 'supervisor':
                    return redirect()->intended(route('supervisor'));
                    break;
                case 'human_resources':
                    return redirect()->intended(route('human_resources'));
                    break;
                default:
                return redirect()->route('home')->with('error','Terjadi Kesalahan');
                    break;
            }
        }else {
            return redirect()->back()->with('error','Password atau NIK salah');
        }
    }
    public function change_pwd(Request $request)
    {
        if (Auth::guard('kary')->attempt(['nik' => auth('kary')->user()->nik, 'password' => $request->current_password])) {
            $validatedData = $request->validate([
                'new_password' => ['required','confirmed'],
            ]);
            $which_user = TbKaryawan::find(auth('kary')->user()->id);
            $which_user->password = Hash::make($request->new_password);
            $which_user->save();
            return redirect()->back()->with('success','Ubah Password Berhasil');
        }else {
            return redirect()->back()->with('error','Ubah Password Gagal');
        }
    }
    public function change_line(Request $request)
    {
        if (Auth::guard('kary')->attempt(['nik' => auth('kary')->user()->nik, 'password' => $request->line_password])) {
            $validatedData = $request->validate([
                'new_line' => ['required'],
            ]);
            $which_user = TbKaryawan::find(auth('kary')->user()->id);
            $which_user->line_kav = $request->new_line;
            $which_user->save();
            return redirect()->back()->with('success','Ubah Line Berhasil');
        }else {
            return redirect()->back()->with('error','Ubah Line Gagal');
        }
    }
    public function logout()
    {
        if(Auth::guard('kary')->check()){
            Auth::guard('kary')->logout();
            return redirect()->intended(route('home'));
        }else{
            return redirect()->intended(route('home'));
        }
    }
}
?>
