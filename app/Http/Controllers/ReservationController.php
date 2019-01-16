<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Reservation;
use App\User;
use App\Http\Requests\MakeReservation;

class ReservationController extends Controller
{
    public function reservate(MakeReservation $request)
    {
    	$customer_nr = Auth::id();
    	$res = new Reservation;
    	$res->customer_nr = $customer_nr;
    	$res->reservation_nr = random_int(0, 342134);
    	$res->total_guests = $request->total_guests;
    	$res->time_in = '00:00';
    	$res->time_out = '02:00';
    	$res->date = $request->date;
    	$res->save();

    	return redirect()->back();
    	// dd($request);
    }
}
