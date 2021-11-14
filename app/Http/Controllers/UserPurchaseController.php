<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserPurchaseController extends Controller
{
    public function index($id)
    {
        $user = User::with('purchases')->findOrFail($id);

        return view('users.purchases.purchases', compact('user'));
    }
}
