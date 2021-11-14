<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserSaleController extends Controller
{
    public function index($id)
    {
         $user = User::with('sales')->findOrFail($id);

         return view('users.sales.sales', compact('user')); 
    }
}
