<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'trip_id',
        'bus',
    ];
    public function trip(){
        return $this->belongsTo(Trip::class);
    }
    public function seats()
    {
        return $this->belongsToMany(Seat::class,'bus_seats')->withPivot("id as seat_bus_id");
    }
    public function busSeats()
    {
        return $this->hasMany(BusSeat::class,'bus_id');
    }
}
