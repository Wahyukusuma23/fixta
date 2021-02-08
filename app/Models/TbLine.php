<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TbLine extends Model
{
    protected $table = 'tb_line';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function karyawan()
    {
        return $this->hasMany('App\Models\TbKaryawan', 'id', 'line_kav');
    }
}
