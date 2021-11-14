@extends('layouts.master')
@section('title', 'Create Groups')
@section('master-content')
    <div class="card">
        <div class="card-header">
            <h3 class="text-info float-left"><i class="fa fa-plus"></i> Add Groups</h3>
            <a href="{{ route('group.index') }}" class="btn btn-primary btn-sm float-right">Back Dashboard</a>
        </div>
        <div class="card-body">
            <form action="{{ route('group.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="">Title</label>
                    <input type="text" name="title" id="" class="form-control" placeholder="Enter a Title">
                </div>
                @error('title')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <div class="form-group">
                    <input type="submit"  id="" class="form-control btn btn-primary" value="Add Group">
                </div>
            </form>
        </div>
    </div>
@endsection
