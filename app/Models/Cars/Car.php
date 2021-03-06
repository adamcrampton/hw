<?php

namespace App\Models\Cars;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $table = 'cars';
    protected $fillable = [
        'number', 'name', 'colour', 'image', 'year', 'type_id', 'series_id', 'series_number', 'treasure_hunt', 'super_treasure_hunt', 'notes'
    ];

    public function owners()
    {
        return $this->belongsToMany('App\Models\Auth\User', 'user_cars', 'cars_id', 'users_id');
    }

    public function series()
    {
        return $this->belongsTo('App\Models\Taxonomy\Series', 'series_id', 'id');
    }

    public function type()
    {
        return $this->belongsTo('App\Models\Taxonomy\Type', 'type_id', 'id');
    }
}
