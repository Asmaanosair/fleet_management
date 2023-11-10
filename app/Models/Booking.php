<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'bus_seat_id',
    ];
    public function seat(){
        return $this->belongsTo(BusSeat::class,'bus_seat_id');
    }
}
