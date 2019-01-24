<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Reservation;
use App\User;
use App\Role;
use App\Table;
use Carbon\Carbon;
use Validator;
use App\Http\Requests\MakeReservation;
use Illuminate\Support\Facades\DB;

class ReservationController extends Controller
{
	public function index()
	{
		$tables = Table::all();
		$reservations = Reservation::all();
		$user = Auth::user();
		$today = Carbon::now()->toDateString();
		// dd($today);
		return view('pages.reservation', compact('tables', 'reservations', 'user', 'today'));
	}
	public function reservate(Request $request)
	{
		// get reservation from vue object
		$reservation = $request->get('reservation');

		// creating the correct dates
		$date_time = explode(' ', $reservation['reservation_nr']);
		$time_in = Carbon::createFromFormat('H:m:s',$date_time[1]);
		$reservation_date = new Carbon($date_time[0]);
		$reservation_date = $reservation_date->toDateString();

		// checking if the values are filled in
		$validator = Validator::make($reservation, [
			'table_nr' => 'required',
			'total_guests' => 'required',
			'reservation_nr' => 'required',
			'customer_nr' => 'required',
		]);
		
		// if they aren't return
		if ($validator->fails() === true) {
			return response()->json([
				'message' => 'Niet alle velden zijn ingevuld'
			], 422);
		} else {
			// retreve all the reservations
			$all_reservations = Reservation::all();

			// see if the user is a employee if yes give it the admin customer number
			$user = User::find($reservation['customer_nr']);
			if ($user->hasRole('employee')) {
				$admin = DB::table('role_user')->where('role_id', '1')->get()->first();
				$admin = User::find($admin->user_id);
				$reservation['customer_nr'] = $admin->customer_nr;
			}

			// if this return true there are no current similar reservations
			$available = Reservation::where('reservation_nr', $reservation['reservation_nr'])->get();

			// loop trough all the exsisting reservations and validate
			foreach ($all_reservations as $a_reservation) {

				// check if the user already has a reservation for that day
				if ($reservation['customer_nr'] == $a_reservation->customer_nr && $reservation_date === $a_reservation->date) {
					return response()->json([
						'message' => 'u heeft al een reservatie voor '.$reservation_date
					], 500);
				}
				// check if there is no reservation at that time
				if ($reservation['reservation_nr'] === $a_reservation->reservation_nr) {
					return response()->json([
						'message' => 'er is al een reservatie op dit tijd stip.'
					], 500);
				}
				// check if the table is not occupied
				if ($reservation['time_in'] == $a_reservation->time_out && $reservation_date === $a_reservation->date) {
					return true;
				}
			}
			// create the the new reservation
			$res = new Reservation;
			$res->customer_nr = $reservation['customer_nr'];
			$res->reservation_nr = $reservation['reservation_nr'];
			$res->total_guests = $reservation['total_guests'];
			$res->time_in = $time_in->toTimeString();
			$res->time_out = $time_in->addHour(1)->toTimeString();
			$res->date = $reservation_date;
			$res->table_nr = $reservation['table_nr'];
			// dd($res);
			$res->save();

			return response()->json([
			   'message' => 'Success'
			], 200);
		}
	}
}
