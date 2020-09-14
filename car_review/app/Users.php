<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table = 'users';

    protected $fillable = [
        'username',
        'password',
        'email',
        'name',
        'birth_date',
        'photo',
        'role'
    ];

    protected $dates = ['birth_date'];

    public function review(){
        return $this->hasMany('App\Review','id_user');
    }
}
