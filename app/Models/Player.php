<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'team_Id' ,
        'name' ,
        'position' ,
        'birth_day',
        'adress' ,
        'phone' ,
        'mail' ,
        'number'
    ];

    public function contract(){
        $this->hasMany(Contract::class);
    }

    public function player_Match_Static(){
        $this->hasMany(Player_Match_Static::class);
    }

     
    public function team(){
        $this->belongTo(Team::class); 
    }
}
