<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class TbKaryawan extends Authenticatable
{
    protected $table = 'tb_karyawan';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nik',
        'nama',
        'ttl',
        'dept',
        'posisi',
        'status_kerja',
        'password',
        'line_kav'
    ];
    public function imp()
    {
        return $this->hasMany('App\Models\TbImp', 'nik', 'nik');
    }
}
