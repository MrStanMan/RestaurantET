<?php

namespace App\Http\Controllers;

use PDF;
use App\User;
use App\Order;
use App\Product;
use App\Reservation;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class CreatepdfController extends Controller
{
	public function index($reservation_nr, $customer_nr)
	{	
		$user = User::find($customer_nr);
		$orders = Order::where('reservation_nr', $reservation_nr)->get();
		$reservation = Reservation::where('reservation_nr', $reservation_nr)->get();
		
		return view('notes.index', compact('orders', 'user', 'reservation'));
	}
	
	public function downloadPDF($reservation_nr)
	{
		$orders = Order::where('reservation_nr', $reservation_nr)->get();
		$reservation = Reservation::where('reservation_nr', $reservation_nr)->get();
		
		$pdf = PDF::loadView('notes.pdf', compact('orders', 'reservation'));
		return $pdf->download('ET_'. $reservation->first()->date .'.pdf');
	}
}