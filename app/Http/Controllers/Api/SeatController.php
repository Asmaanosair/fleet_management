<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BusSeat;
use App\Models\Destination;
use App\Models\Seat;
use App\Models\Trip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class SeatController extends Controller
{
    /**
     * @return mixed
     */

    public function __construct()
    {
        $this->middleware('auth:sanctum');


    }
    public function availableSeats(Request $request)
    {
        $data = $request->only(['station_from_id','station_to_id']);
        $validator =  Validator::make($data, [
            'station_from_id' => 'required|numeric',
            'station_to_id' => 'required|numeric'
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            return response()->failed($errors,422);
        }

        $stationFromId=$request->station_from_id;
        $stationToId=$request->station_to_id;
        $query = BusSeat::query();
        $query->where('bus_seats.available', true);
        $query->leftJoin('buses', 'bus_seats.bus_id', '=', 'buses.id');
        $query->leftJoin('trips', 'buses.trip_id', '=', 'trips.id');
        $query->leftJoin('destinations as destinationFrom', 'destinationFrom.trip_id', '=', 'trips.id');
        $query->leftJoin('destinations as destinationTo', 'destinationTo.trip_id', '=', 'trips.id');
        $query->where('destinationFrom.station_id', $stationFromId);
        $query->where('destinationTo.station_id', $stationToId);
        $query->whereColumn('destinationFrom.trip_id', '=', 'destinationTo.trip_id');
        $query->whereColumn('destinationFrom.sequence', '<', 'destinationTo.sequence');
        $query->leftJoin('stations as stationFrom', 'destinationFrom.station_id', '=', 'stationFrom.id');
        $query->leftJoin('stations as stationTo', 'destinationTo.station_id', '=', 'stationTo.id');
        $query->leftJoin('stations as tripFrom', 'tripFrom.id', '=', 'trips.station_from_id');
        $query->leftJoin('stations as tripTo', 'tripTo.id', '=', 'trips.station_to_id');
        $query->select('bus_seats.id as bus_seat_id', 'buses.bus','stationFrom.station as stationFrom',
            'stationTo.station as stationTo',
            'tripFrom.station as tripFrom','tripTo.station as tripTo');
        $seat = $query->paginate(10);
        return response()->success($seat,200);
    }
}
