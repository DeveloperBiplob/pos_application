@extends('layouts.master')
@section('title', 'Create Category')
@section('master-content')
    <div class="card">
        <div class="card-header">
            <h3 class="text-info float-left">Add Category</h3>
            <a href="{{ route('category.index') }}" class="btn btn-primary btn-sm float-right">Back Dashboard</a>
        </div>
        <div class="card-body">
            <form action="{{ route('category.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="">Category</label>
                    <input type="text" name="title" id="" class="form-control" placeholder="Enter a Category">
                </div>
                @error('title')
                <span class="text-danger">{{ $message }}</span>
                @enderror
                <div class="form-group">
                    <input type="submit"  id="" class="form-control btn btn-primary" value="Add Users">
                </div>
            </form>
        </div>
    </div>
@endsection