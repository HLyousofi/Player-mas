<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'team_Id' ,
        'name' ,
        'role' ,
        'adress' ,
        'phone' ,
        'mail' ,
    ];
    

    public function contract(){
        $this->hasMany(Contract::class);
    }

    public function team(){
        $this->belongTo(Team::class); 
    }

}
