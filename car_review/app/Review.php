<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table = 'review';

    protected $fillable = [
        'id_car',
        'id_user',
        'review',
    ];

    public function users(){
        return $this->belongsTo('App\Users','id_user');
    }

    public function car(){
        return $this->belongsTo('App\Car','id_car');
    }
}
