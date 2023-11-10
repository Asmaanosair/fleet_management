<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'station_from_id',
        'station_to_id',
    ];

    public function destination(){
        return $this->hasMany(Destination::class);
    }
    public function bus(){
        return $this->hasMany(Bus::class);
    }

    public function fromStation(){
        return $this->belongsTo(Station::class,'station_from_id');
    }
    public function toStation(){
        return $this->belongsTo(Station::class,'station_to_id');
    }
}
