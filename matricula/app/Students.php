<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    protected $fillable = ['',''];
    public function curses(){
        return $this->hasMany(Curses::class);
    }
}
