<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team_Match_Statistic extends Model
{
    use HasFactory;

    public function team(){
        $this->belongTo(Team::class); 
    }

    public function matche(){
        $this->belongTo(Matche::class); 
    }
}
