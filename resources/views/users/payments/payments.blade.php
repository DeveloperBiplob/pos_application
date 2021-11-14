@extends('users.layouts.user_show_layout')
@section('tilte', 'Show User')
@section('user_content')
<div class="card">
    <div class="card-header">
        <h3 class="text-info float-left">Payment of <strong>{{ $user->name }}</strong></h3>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <tr>
                                <th>Customer</th>
                                <th>Date</th>
                                <th>Totla</th>
                                <th>Note</th>
                                <th>Actions</th>
                            </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Customer</th>
                            <th>Date</th>
                            <th class="text-right">Total = {{ $user->payments()->sum('amount') }}</th>
                            <th>Note</th>
                            <th>Actions</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($user->payments as $payment )
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $payment->date }}</td>
                            <td class="text-right">{{ $payment->amount }}</td>
                            <td>{{ $payment->note }}</td>
                            <td>
                                <form class="d-inline" action="{{ route('user.payments.destroy', $payment->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick=" return confirm('Are you Sure Delete This Data?')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

{{-- adding modal for add new paymnet --}}

  <div class="modal fade" id="paymentModal" tabindex="-1" role="dialog" aria-labelledby="paymentModalModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{ route('user.payments.store', $user->id) }}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="paymentModalModalLabel">Add Payment</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="form-group">
                      <label for="">Date</label>
                      <input type="date" class="form-control" name="date" id="" required>
                  </div>
                  <div class="form-group">
                      <label for="">Amount</label>
                      <input type="text" class="form-control" name="amount" placeholder="Enter Amount" id="" required>
                  </div>
                  <div class="form-group">
                      <label for="">Note</label>
                      <textarea name="note" id="" cols="30" rows="5" class="form-control" placeholder="Enter Note..."></textarea>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Save Payment</button>
                </div>
              </div>
        </form>
    </div>
  </div>

@endsection
