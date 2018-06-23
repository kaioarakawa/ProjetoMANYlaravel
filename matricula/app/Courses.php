<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    protected $fillable = ['Nome_Curso','Ementa','Qtn_Aluno'];
    public function courses(){
        return $this->belongsToMany(Students::class);
    }
}
