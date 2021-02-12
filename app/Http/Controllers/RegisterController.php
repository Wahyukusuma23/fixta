<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\TbImp;
use App\Models\TbKaryawan;
use App\Models\TbLine;
use App\User;
use Auth;

class RegisterController extends Controller
{
    public function view()
    {
        $lines = TbLine::get();
        return view('register', compact('lines'));
    }
    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'nik' => ['required', 'max:15', 'unique:App\Models\TbKaryawan,nik'],
            'nama' => ['required', 'max:70'],
            'ttl' => ['required'],
            'dept' => ['required'],
            'status_kerja' => ['required'],
            'line_kav' => ['required'],
            'password' => ['required','confirmed'],
        ]);
        if (isset($request->posisi)) {
            $posisi = $request->posisi;
        } else {
            $posisi = 'operator';
        }

        $add_user = TbKaryawan::create([
            'nik' => $request->nik,
            'nama' => $request->nama,
            'ttl' => $request->ttl,
            'dept' => $request->dept,
            'posisi' => $posisi,
            'status_kerja' => $request->status_kerja,
            'line_kav' => $request->line_kav,
            'password' => Hash::make($request->password),
        ]);
        if ($add_user) {
            Auth::guard('kary')->attempt(['nik' => $request->nik, 'password' => $request->password]);
            return redirect()->route('karyawan.index')->with('success', 'Pendaftaran akun berhasil');
        } else {
            return redirect()->route('home')->with('error', 'Pendaftaran Gagal');
        }
    }
}
?>
