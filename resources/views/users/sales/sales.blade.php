@extends('users.layouts.user_show_layout')
@section('tilte', 'Show User')
@section('user_content')
<div class="card">
    <div class="card-header">
        <h3 class="text-info float-left">Sales of <strong>{{ $user->name }}</strong></h3>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <tr>
                                <th>Customer</th>
                                <th>Challan</th>
                                <th>Date</th>
                                <th>Totla</th>
                                <th>Actions</th>
                            </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Customer</th>
                            <th>Challan</th>
                            <th>Date</th>
                            <th>Total</th>
                            <th>Actions</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($user->sales as $sale )
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $sale->challan_no }}</td>
                            <td>{{ $sale->date }}</td>
                            <td>200</td>
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
