@extends('layouts.master')
@section('title', 'Update Group')
@section('master-content')
    <div class="card">
        <div class="card-header">
            <h3 class="text-info float-left">Update Groups</h3>
            <a href="{{ route('group.index') }}" class="btn btn-primary btn-sm float-right"><i class="fa fa-arrow-left"></i> Back Dashboard</a>
        </div>
        <div class="card-body">
            <form action="{{ route('group.update', $group->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="">Title</label>
                    <input type="text" name="title" id="" class="form-control" value="{{ $group->title }}">
                </div>
                <div class="form-group">
                    <input type="submit"  id="" class="form-control btn btn-primary" value="Add Group">
                </div>
            </form>
        </div>
    </div>
@endsection
