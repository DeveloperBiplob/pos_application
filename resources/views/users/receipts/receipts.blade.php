@extends('users.layouts.user_show_layout')
@section('tilte', 'Show User')
@section('user_content')
<div class="card">
    <div class="card-header">
        <h3 class="text-info float-left">Receipts of <strong>{{ $user->name }}</strong></h3>
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
                            <th>Total</th>
                            <th>Note</th>
                            <th>Actions</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($user->receipts as $receipt )
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $receipt->date }}</td>
                            <td>{{ $receipt->amount }}</td>
                            <td>{{ $receipt->note }}</td>
                            <td>
                                <a class="btn btn-info btn-sm" href=""><i class="fa fa-eye"></i></a>
                                <form class="d-inline" action="" method="POST">
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
@endsection
