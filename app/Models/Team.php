<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    public function matche(){
        $this->hasMany(Matche::class); 
    }

    public function staff(){
        $this->hasMany(Staff::class); 
    }

    public function player(){
        $this->hasMany(Player::class); 
    }

    public function team_Match_Static(){
        $this->hasMany(Team_Match_Static::class); 
    }

}
