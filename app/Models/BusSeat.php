<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusSeat extends Model
{
    use HasFactory;
    protected $fillable = [
        'available',
        'bus_id',
        'seat_id',
    ];
    public function bus(){
        return $this->belongsTo(Bus::class,'bus_id');
    }
    public function seat(){
        return $this->belongsTo(Seat::class,'seat_id');
    }
}
