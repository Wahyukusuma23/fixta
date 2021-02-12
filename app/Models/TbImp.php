<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\User;

class TbImp extends Model
{
    protected $table = 'tb_imp';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nik',
        'approve_eb',
        'approve_ll',
        'approve_spv',
        'no_imp',
        'tgl_ijin',
        'lama_ijin',
        'id_ijin',
        'alasan_ijin',
        'lampiran'
    ];
    public function karyawan()
    {
        return $this->belongsTo('App\Models\TbKaryawan', 'nik', 'nik');
    }
    public function ijin()
    {
        return $this->belongsTo('App\Models\TbIjin', 'id_ijin', 'id');
    }
    protected $casts = [
        'tgl_ijin' => 'datetime:d-m-Y',
        'approve_ll'  => 'datetime:d-m-Y',
        'approve_spv' => 'datetime:d-m-Y',
    ];
}
