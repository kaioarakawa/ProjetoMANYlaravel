<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    protected $fillable = ['nameCourse','Ementa','qtnStudents'];
    public function user(){
        return $this->belongsToMany(User::class, 'registrations','user_id','courses_id')->withPivot('authorized','id')->withTimestamps();
    }
}
