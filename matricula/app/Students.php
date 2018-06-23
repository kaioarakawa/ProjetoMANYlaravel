<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    protected $fillable = ['Nome_Aluno','CPF','RG','Estado','Cidade','Rua','Numero','Celular'];
    public function courses(){
        return $this->belongToMany(Courses::class, 'registrations', 'user_id', 'curso_id')
        ->withPivot('authorized')
        ->as('registrations')
        ->withTimestamps();
    }
}
