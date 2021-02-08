<?php

namespace App\Http\Controllers;

use App\Models\TbImp;
use App\Models\TbKaryawan;
use App\User;
use Illuminate\Http\Request;
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
                    return redirect()->route('karyawan.index');
                    break;
                case 'line_leader':
                    return redirect()->route('line_leader');
                    break;
                case 'supervisor':
                    return redirect()->route('supervisor');
                    break;
                case 'hrd':
                    return redirect()->route('human_resources');
                    break;
                default:
                return redirect()->route('home')->with('error','Terjadi Kesalahan');
                    break;
            }
        }else {
            return redirect()->back()->with('error','Password atau NIK salah');
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
