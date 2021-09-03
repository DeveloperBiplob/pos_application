@extends('layouts.master')
@section('tilte', 'Show Groups')
@section('master-content')
    <div class="card">
        <div class="card-header">
            <h3 class="text-info float-left">Show Groups</h3>
            <a href="{{ route('group.index') }}" class="btn btn-primary btn-sm float-right">Back Dashboard</a>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>ID</th>
                    <td>{{ $group->id }}</td>
                </tr>
                <tr>
                    <th>Title</th>
                    <td>{{ $group->title }}</td>
                </tr>
            </table>
        </div>
    </div>
@endsection