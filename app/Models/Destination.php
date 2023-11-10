<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'trip_id',
        'station_id',
        'sequence',
    ];
    public function trip(){
        return $this->belongsTo(Trip::class);
    }
    public function stationFrom(){
        return $this->belongsTo(Station::class,'station_id');
    }
    public function stationTo(){
        return $this->belongsTo(Station::class,'station_id');
    }
}
