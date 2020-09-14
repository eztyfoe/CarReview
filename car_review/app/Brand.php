<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $table = 'brand';

    protected $fillable = [
        'name',
        'origin',
        'description',
        'image',
        'created_date'
    ];

    protected $dates = ['created_date'];

    public function car(){
        return $this->hasMany('App\Car','id_brand');
    }
}
