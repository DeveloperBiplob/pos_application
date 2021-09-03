@extends('layouts.master')
@section('title', 'Create Product')
@section('master-content')
    <div class="card">
        <div class="card-header">
            <h3 class="text-info float-left">Add Product</h3>
            <a href="{{ route('product.index') }}" class="btn btn-primary btn-sm float-right">Back Dashboard</a>
        </div>
        <div class="card-body">
            <form action="{{ route('product.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="">Select Category<span class="text-danger">*</span></label>
                    <select class="form-control" name="category_id" id="">
                        <option value="">Select Group</option>
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->title }}</option>       
                        @endforeach
                    </select>
                </div>
                @error('category_id')
                <span class="text-danger">{{ $message }}</span>
                @enderror
                <div class="form-group">
                    <label for="">Procuct Title</label>
                    <input type="text" name="title" id="" class="form-control" placeholder="Enter a Product Title">
                </div>
                @error('title')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <div class="form-group">
                    <label for="">Procuct Description</label>
                    <textarea class="form-control" name="description" id="" cols="30" rows="5" placeholder="Enter a Product Description"></textarea>
                </div>
                @error('description')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <div class="form-group">
                    <label for="">Procuct Cost Price</label>
                    <input type="text" name="cost_price" id="" class="form-control" placeholder="Enter a Product Cost Price">
                </div>
                @error('cost_price')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <div class="form-group">
                    <label for="">Procuct Price</label>
                    <input type="text" name="price" id="" class="form-control" placeholder="Enter a Product price">
                </div>
                @error('price')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <div class="form-group">
                    <input type="submit"  id="" class="form-control btn btn-primary" value="Add Group">
                </div>
            </form>
        </div>
    </div>
@endsection