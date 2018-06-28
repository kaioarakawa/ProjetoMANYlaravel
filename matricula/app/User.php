<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','CPF','RG','state','city','street','numberHouse','numberTel','isAdmin',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function courses(){
        return $this->belongToMany(Courses::class, 'registrations', 'user_id', 'curso_id')
        ->withPivot('authorized')
        ->as('registrations')
        ->withTimestamps();
    }
}
