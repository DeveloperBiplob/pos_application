@extends('users.layouts.user_show_layout')
@section('tilte', 'Show User')
@section('user_content')
<div class="card">
    <div class="card-header">
        <h3 class="text-info float-left">User Details of <strong>{{ $user->name }}</strong></h3>
    </div>
    <div class="card-body">
        <div class="col-md-12">
            <table class="table table-bordered">
                <tr>
                    <th>ID</th>
                    <td>{{ $user->id }}</td>
                </tr>
                <tr>
                    <th>Group</th>
                    <td>{{ $user->group->title ?? '' }}</td>
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
</div>
@endsection

