<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Order;
use App\Reservation;
use App\Table;
use App\User;
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

        $start_month = Carbon::now()->startOfMonth()->toDateString();
        $end_month = Carbon::now()->endOfMonth()->toDateString();

        $reservation = Reservation::where('date', $date->toDateString())->orderBy('date', 'desc')->get();
    	$res_week = Reservation::whereBetween('date', [$start_week, $end_week])->get();
        $res_month = Reservation::whereBetween('date', [$start_month, $end_month])->get();

    	return view('pages.order', compact('orders', 'tables', 'reservation', 'res_week', 'res_month'));
    }
    public function view_customer_order($reservation_nr)
    {
    	$reservation = Reservation::where('reservation_nr', $reservation_nr)->get()->first();
    	$products = Product::all();
    	return view('orders.customerOrder', compact('reservation', 'products'));
    }

    public function view_customer_order_user($user, $reservation_nr)
    {
        $user = User::where('customer_nr', $user)->get()->first();
        $reservation = Reservation::where('reservation_nr', $reservation_nr)->get()->first();
        $products = Product::all();

        if (Auth::user()->hasRole('administrator') || Auth::user()->hasRole('employee')) {
            return view('account.order', compact('user','reservation', 'products'));
        }
        if(User::Check($user) != false){
            return view('account.order', compact('user','reservation', 'products'));
        } else {
            return redirect()->back()->with('error', 'Je kunt deze bestelling niet bekijken!');
        }
    }

    public function view_customer_order_json($reservation_nr)
    {
        $orders = Order::where('reservation_nr', $reservation_nr)->get();
        foreach ($orders as $order) {
            $product_ordered[] = [
                'product' => Product::where('product_nr', $order->product_nr)->get(),
                'total' => $order->total_ordered
            ];
        }
        return response([
            'product_ordered' => $product_ordered
        ], 200);
    }
    public function new_order(Request $request)
    {
        if ($request->product == []) {
            return response([
                'message' => 'Niks besteld'
            ], 422);
        } else {
            foreach ($request->product as $orders) {
    	    	$order = Order::create(
    	    		['device' => 1,
    	    		'timestamp' => Carbon::now()->toDateTimeString(),
    	    		'reservation_nr' => $orders['reservation_nr'],
    	    		'table_nr' => $orders['table_nr'],
    	    		'product_nr' => $orders['product_nr'],
    	    		'total_ordered' => $orders['total'],
    	    		'time' => Carbon::now()->toTimeString()]
    	    	);
            }
        	return response([
                'message' => 'Succesvol besteld'
            ], 200);
        }
    }
}
