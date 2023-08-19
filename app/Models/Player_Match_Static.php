<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player_Match_Static extends Model
{
    use HasFactory;

    public function matche(){
        $this->belongsTo(Matche::class);
    }

    public function player(){
        $this->belongTo(Player::class);
    }
}
