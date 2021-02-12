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
    public function line()
    {
        return $this->belongsTo('App\Models\TbLine', 'line_kav', 'id');
    }
}
