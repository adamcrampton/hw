<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $table = 'cars';

    public function series()
    {
        return $this->belongsTo('App\Models\Series', 'series_id', 'id');
    }

    public function type()
    {
        return $this->belongsTo('App\Models\Type', 'type_id', 'id');
    }
}
