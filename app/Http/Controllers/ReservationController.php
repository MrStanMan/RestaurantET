<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Reservation;
use App\User;
use App\Role;
// use App\Role;
use App\Table;
use App\Order;
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

	public function deleteReservation(Request $request, $reservation_nr)
    {
		$order = Order::where('reservation_nr', $reservation_nr)->get();

		if($order->first())
		{
			return redirect()->back()->with('error', 'Op deze reservering zijn al bestellingen geplaatst !');
		}
		else
		{
			$reservation = Reservation::find($reservation_nr);
			$reservation->delete($request->all());

			return redirect()->back()->with('success', 'De reservering is succesvol geanulleerd !');
		}
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
			'extra_info' => 'max:128',
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
			if ($user->hasRole('administrator')) {
				$table = Table::find($reservation['table_nr']);
				$table->status = 0;
				$table->save();
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
			$res->extra_info = $reservation['extra_info'];
			$res->table_nr = $reservation['table_nr'];
			// dd($res);
			$res->save();

			return response()->json([
			   'message' => 'Success'
			], 200);
		}
	}
	public function export(Request $request){
		// dd($request->type);
		// $type = $request->get('type');
	  $date = Carbon::now();

	  $start_week = Carbon::now()->startOfWeek()->toDateString();
	  $end_week = Carbon::now()->endOfWeek()->toDateString();

		$start_month = Carbon::now()->startOfMonth()->toDateString();
		$end_month = Carbon::now()->endOfMonth()->toDateString();


	  $res_week = Reservation::whereBetween('date', [$start_week, $end_week])->get();
		$res_month = Reservation::whereBetween('date', [$start_month, $end_month])->get();
	  $csvExporter = new \Laracsv\Export();

		if ($request->type == 'week') {
			$csvExporter->build($res_week, ['reservation_nr', 'customer_nr', 'total_guests', 'table_nr', 'time_in', 'time_out', 'date' ])->download();
		} elseif($request->type == 'month') {
			$csvExporter->build($res_month, ['reservation_nr', 'customer_nr', 'total_guests', 'table_nr', 'time_in', 'time_out', 'date' ])->download();
		}
		else{
			dd($request->type);
		}
	}

	public function api(Request $request)
	{
		$user = (int)$request->all()['customer_nr'];
		// dd((int)$user);
		$user = User::find($user);
		// dd($user);
		// dd($user->hasRole('useristrator'));
		if ($user->hasRole('administrator')) {
			return response()->json([
				'admin' => $user
			], 200);
		} else {
			return response()->json([
				'logged_user' => $user
			], 200);
		}
	}
}
