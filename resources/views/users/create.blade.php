@extends('layouts.master')
@section('title', 'Create Users')
@section('master-content')
    <div class="card">
        <div class="card-header">
            <h3 class="text-info float-left">Add Users</h3>
            <a href="{{ route('user.index') }}" class="btn btn-primary btn-sm float-right"><i class="fa fa-arrow-left"></i> Back Dashboard</a>
        </div>
        <div class="card-body">
            <form action="{{ route('user.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="">Select<span class="text-danger">*</span></label>
                    <select class="form-control" name="group_id" id="">
                        <option value="">Select Group</option>
                        @foreach ($groups as $group)
                        <option value="{{ $group->id }}">{{ $group->title }}</option>
                        @endforeach
                    </select>
                </div>
                @error('group_id')
                <span class="text-danger">{{ $message }}</span>
                @enderror
                <div class="form-group">
                    <label for="">Name<span class="text-danger">*</span></label>
                    <input type="text" name="name" id="" class="form-control" placeholder="Enter a Name">
                </div>
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <div class="form-group">
                    <label for="">Email<span class="text-danger">*</span></label>
                    <input type="text" name="email" id="" class="form-control" placeholder="Enter a Email">
                </div>
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <div class="form-group">
                    <label for="">Phone<span class="text-danger">*</span></label>
                    <input type="text" name="phone" id="" class="form-control" placeholder="Enter a Phone">
                </div>
                @error('phone')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <div class="form-group">
                    <label for="">Address</label>
                    <input type="text" name="address" id="" class="form-control" placeholder="Enter a Address">
                </div>
                @error('address')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <div class="form-group">
                    <input type="submit"  id="" class="form-control btn btn-primary" value="Add Users">
                </div>
            </form>
        </div>
    </div>
@endsection
