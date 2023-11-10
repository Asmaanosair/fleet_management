<?php

namespace App\Http\Controllers\Api;

use App\Enums\SeatAvailable;
use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BookingController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:sanctum');


    }
    public function booking(Request $request)
    {
        $data = $request->only('bus_seat_id');
        $validator =  Validator::make($data, [
            'bus_seat_id' => 'required|numeric'
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            return response()->failed($errors,422);
        }
        $data = $request->only('bus_seat_id');
        $data['user_id'] =auth()->user()->getAuthIdentifier();
        $booking = Booking::Create($data);
        $busSeat = $booking->seat;
        $busSeat->update(['available'=> SeatAvailable::NOT_AVAILABLE]);
        return response()->success($booking,201);
    }





}
