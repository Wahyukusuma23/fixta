<?php

namespace App\Http\Controllers;

use App\Models\TbImp;
use App\Models\TbKaryawan;
use App\User;
use Illuminate\Http\Request;
use Auth;

class KaryawanController extends Controller
{
    public function index()
    {
        return view('kary_dashboard');
    }
    public function form_imp()
    {
        return view('form');
    }
    public function list_pengajuan()
    {
        return view('admin');
    }
}
?>
