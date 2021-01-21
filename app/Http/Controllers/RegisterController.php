<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\TbImp;
use App\Models\TbKaryawan;
use App\User;

class RegisterController extends Controller
{
    public function view()
    {
        // dd(TbKaryawan::get());
            return view('register');
    }
    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'nik' => ['required', 'max:255', 'unique:App\Models\TbKaryawan,nik'],
            'nama' => ['required'],
            'ttl' => ['required'],
            'dept' => ['required'],
            'posisi' => ['required'],
            'status_kerja' => ['required'],
            'line_kav' => ['required'],
            'password' => ['required','confirmed'],
        ]);
        // dd($request->all());
            // return view('register');
        $add_user = TbKaryawan::create([
            'nik' => $request->nik,
            'nama' => $request->nama,
            'ttl' => $request->ttl,
            'dept' => $request->dept,
            'posisi' => $request->posisi,
            'status_kerja' => $request->status_kerja,
            'line_kav' => $request->line_kav,
            'password' => Hash::make($request->password),
        ]);
        if ($add_user) {
            dd('ok');
        } else {
            dd('not ok');
        }

    }
}
?>
