<?php

namespace App\Http\Controllers;

use PDF;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class CreatepdfController extends Controller
{
	public function index($customer_nr)
	{	
		$users = User::where('customer_nr', $customer_nr)->get();
		
		return view('notes.index', compact('users'));
	}
	
	public function downloadPDF($customer_nr)
	{
		$data = User::find($customer_nr);
		
		$pdf = PDF::loadView('notes.pdf', compact('data'));
		return $pdf->download('factuur.pdf');
	}
}