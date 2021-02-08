<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TbIjin extends Model
{
    protected $table = 'tb_ijin';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function imp()
    {
        return $this->hasMany('App\Models\TbImp', 'id', 'id_ijin');
    }
}
