@extends('layouts.master')
@section('tilte', 'Show User')
@section('master-content')
    <div class="card">
        <div class="card-header">
            <h3 class="text-info float-left">Show User</h3>
            <a href="{{ route('user.index') }}" class="btn btn-primary btn-sm float-right">Back Dashboard</a>
        </div>
        <div class="card-body">
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
    </div>
@endsection