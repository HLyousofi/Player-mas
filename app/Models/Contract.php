<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class contract extends Model
{
    use HasFactory;

    protected $fillable = [
        'beneficiary_Id',
        'team_Id',
        'start_Date' ,
        'end_Date' ,
        'salary' ,
        'type',
        'beneficiary_Type'
      
    ];

    public function staff(){
        $this->belongsTo(Staff::class);
    }

    public function player(){
        $this->belongsTo(Player::class);
    }
}
