<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class AdminController extends Controller
{
    public function welcome()
    {
    	$users = User::all(); 
    	return view('admin.index', compact('users'));
    }
}
