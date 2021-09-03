@extends('layouts.master')
@section('tilte', 'Show User')
@section('master-content')
    <div class="card">
        <div class="card-header">
            <h3 class="text-info float-left">User Details</h3>
            <div class="float-right">
                <a href="{{ route('user.index') }}" class="btn btn-danger btn-sm">Back Dashboard</a>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-8">
                    <table class="table table-bordered">
                        <tr>
                            <th>ID</th>
                            <td>{{ $user->id }}</td>
                        </tr>
                        <tr>
                            <th>Group</th>
                            <td>{{ $user->group_id }}</td>
                        </tr>
                        <tr>
                            <th>Name</th>
                            <td>{{ $user->name }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{ $user->email }}</td>
                        </tr>
                        <tr>
                            <th>Phone</th>
                            <td>{{ $user->phone }}</td>
                        </tr>
                        <tr>
                            <th>Address</th>
                            <td>{{ $user->address }}</td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-2">
                    <table class="table table-bordered">
                        <tr>
                            <th class="text-center">User Add Action</th>
                        </tr>
                        <tr>
                            <td class="text-center">
                                <a href="{{ route('user.index') }}" class="btn btn-primary btn-sm " style="width:150px">New Sale</a>
                                <a href="{{ route('user.index') }}" class="btn btn-primary btn-sm mt-2" style="width:150px">New Purchase</a>
                                <a href="{{ route('user.index') }}" class="btn btn-primary btn-sm mt-2" style="width:150px">New payment</a>
                                <a href="{{ route('user.index') }}" class="btn btn-primary btn-sm mt-2" style="width:150px">New Receipt</a>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection