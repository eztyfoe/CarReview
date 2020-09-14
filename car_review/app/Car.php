<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $table = 'car';

    protected $fillable = [
        'name',
        'id_brand',
        'description',
        'top_speed',
        'horse_power',
        'torque',
        'image',
        'created_date'
    ];

    protected $dates = ['created_date'];

    public function review(){
        return $this->hasMany('App\Review','id_car');
    }

    public function brand(){
        return $this->belongsTo('App\Brand','id_brand');
    }
}
