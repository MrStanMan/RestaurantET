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
        $admin = DB::table('role_user')->where('role_id', '1')->get()->first();
        $admin = User::find($admin->user_id);
        // dd($admin);
		return view('pages.reservation', compact('tables', 'reservations', 'admin'));
	}
    public function reservate(Request $request)
    {
    	$this->validate(request(), [
            'name' => 'required',
            'email' => 'required',
        ]);

        // return ['message' => 'gereverveerd'];
        return response()->json([
           'task'    => $task,
           'message' => 'Success'
        ], 200);
    	// if ($request->total_guests > 8) {
    	// 	return redirect()->back()->with('error', 'u kunt maximaal 8 gasten meenemen');
    	// }
    	// $validator = Validator::make($request->all(), [
     //        'total_guests' => ['required', 'integer'],
     //        'time_in' => ['required', 'required_with:password_confirmed','same:password_confirmed'],
     //        'password_confirmed' => ['required'],
     //    ]);
     //    if ($validator->fails()) {
     //        return redirect()->back()->withErrors($validator);
     //    } elseif ($validator->fails() == true) {
     //    	$user->delete();
     //    	return redirect()->route('login')->with('success', 'account verwijderd');
     //    }

    	// $rd = explode('/', $request->date);
    	// $rd = Carbon::createFromDate($rd[2], $rd[0], $rd[1]);
    	// $date = new Carbon($request->date . $request->time_in . ':00');
    	// $res = new Reservation;
    	// $res->customer_nr = Auth::id();
    	// $res->reservation_nr = $date->toDateTimeString();
    	// $res->total_guests = $request->total_guests;
    	// $res->time_in = $date->toTimeString();
    	// $res->time_out = $date->addHour(1)->toTimeString();
    	// $res->date = $rd;
    	// $res->table_nr = $request->table_nr;
    	// $res->save();

    	return redirect()->back()->with('success', 'Gereserveerd voor '.$date.' voor '.$request->total_guests.' personen.');
    }
}
