<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Reservation;
use App\Table;
use App\Product;
use Carbon\Carbon;

class OrderController extends Controller
{
    public function index()
    {
    	$orders = Order::all();
    	$tables = Table::all();
    	$date = Carbon::now();

    	$start_week = Carbon::now()->startOfWeek()->toDateString();
    	$end_week = Carbon::now()->endOfWeek()->toDateString();

    	$reservation = Reservation::where('date', $date->toDateString())->orderBy('date', 'desc')->get();
    	$res_week = Reservation::whereBetween('date', [$start_week, $end_week])->get();

    	return view('pages.order', compact('orders', 'tables', 'reservation', 'res_week'));
    }
    public function view_customer_order($reservation_nr)
    {
    	// $order = Order::where('reservation_nr', $reservation_nr)->get();
    	$reservation = Reservation::where('reservation_nr', $reservation_nr)->get()->first();
    	// dd($reservation->order);
    	$products = Product::all();
    	return view('orders.customerOrder', compact('reservation', 'products'));
    }
    public function new_order(Request $request)
    {
    	// dd($request);
    	// Order::create([
    	// 	'device' => 1,
    	// 	'timestamp' => Carbon::now()->toDateTimeString(),
    	// ]);
    	foreach ($request->all() as $orders) {
	    	for ($i=0; $i < count($request->all()); $i++) { 
		    	$order = Order::updateOrCreate(
		    		['reservation_nr' => $orders[$i]['reservation_nr'],
		    		'table_nr' => $orders[$i]['table_nr'],
		    		'product_nr' => $orders[$i]['product_nr'],
		    		'total_ordered' => $i],
		    		['device' => 1,
		    		'timestamp' => Carbon::now()->toDateTimeString(),
		    		'reservation_nr' => $orders[$i]['reservation_nr'],
		    		'table_nr' => $orders[$i]['table_nr'],
		    		'product_nr' => $orders[$i]['product_nr'],
		    		'total_ordered' => $orders[$i]['total'],
		    		'time' => Carbon::now()->toTimeString()]
		    	);
		    	dd($order);
	    	}
    	}

    	return response()->json([
           'order'    => $order,
           'message' => 'Success'
        ], 200);
    	// dd($request);
    }
}
