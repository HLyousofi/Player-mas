<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matche extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'team_Id' ,
        'adv_Name' ,
        'matche_Date' ,
        'league',
        'type' 
    ];


    public function team(){
        $this->belongsTo(Team::class);
    }

    public function team_Match_Static(){
        $this->belongsTo(Team_Match_Static::class);
    }

    public function player_Match_Static(){
        $this->hasMany(Player_Match_Static::class);
    }
}
