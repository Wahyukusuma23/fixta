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
}
