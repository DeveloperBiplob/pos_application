<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserReceiptsController extends Controller
{
    public function index($id)
    {
        $user = User::with('receipts')->findOrFail($id);

        return view('users.receipts.receipts', compact('user'));
    }
}
