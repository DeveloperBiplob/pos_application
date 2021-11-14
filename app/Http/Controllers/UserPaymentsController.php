<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserPaymentsController extends Controller
{
    public function index($id)
    {
        $user = User::with('payments')->findOrFail($id);

        return view('users.payments.payments', compact('user'));
    }

    public function store(Request $request, User $user)
    {
        $request->validate([
            'date' => ['required'],
            'amount' => ['required', 'numeric'],
            'note' => ['nullable', 'string', 'max:200'],
        ]);

        $addPayment = $user->payments()->create([
            'admin_id' => Auth::user()->id,
            'amount' => $request->amount,
            'date' => $request->date,
            'note' => $request->note
        ]);

        if($addPayment){
            $this->setNotification('Payment add Successfully!', 'success');
            return redirect()->route('user.payments', $user->id);
        }else{
            return back();
        }

    }

    public function destroy(Payment $payment)
    {
        // return $payment;
        if($payment->delete()){
            $this->setNotification('Payment Delete Successfully!', 'success');
            return back();
        }else{
            return back();
        }
    }
}
