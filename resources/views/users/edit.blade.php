@extends('layouts.master')
@section('title', 'Update users')
@section('master-content')
    <div class="card">
        <div class="card-header">
            <h3 class="text-info float-left">Update Users</h3>
            <a href="{{ route('user.index') }}" class="btn btn-primary btn-sm float-right">Back Dashboard</a>
        </div>
        <div class="card-body">
            <form action="{{ route('user.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="">Select</label>
                    <select class="form-control" name="group_id" id="">
                        <option value="{{ $user->group_id }}">{{ $user->group->title }}</option>
                        @foreach ($groups as $group)
                        <option value="{{ $group->id }}">{{ $group->title }}</option>  
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Title</label>
                    <input type="text" name="name" id="" class="form-control" value="{{ $user->name }}">
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="text" name="email" id="" class="form-control" value="{{ $user->email }}">
                </div>
                <div class="form-group">
                    <label for="">Phone</label>
                    <input type="text" name="phone" id="" class="form-control" value="{{ $user->phone }}">
                </div>
                <div class="form-group">
                    <label for="">Address</label>
                    <input type="text" name="address" id="" class="form-control" value="{{ $user->address }}">
                </div>
                <div class="form-group">
                    <input type="submit"  id="" class="form-control btn btn-primary" value="Add Group">
                </div>
            </form>
        </div>
    </div>
@endsection