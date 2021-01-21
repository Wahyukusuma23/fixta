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
            dd();
        }else {
            return redirect()->back()->with('error','Password atau NIK salah');
        }
    }
}
?>
