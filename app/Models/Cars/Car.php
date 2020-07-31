<?php

namespace App\Models\Cars;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $table = 'cars';

    public function series()
    {
        return $this->belongsTo('App\Models\Taxonomy\Series', 'series_id', 'id');
    }

    public function type()
    {
        return $this->belongsTo('App\Models\Taxonomy\Type', 'type_id', 'id');
    }
}
