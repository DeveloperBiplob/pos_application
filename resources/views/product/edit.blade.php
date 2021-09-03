@extends('layouts.master')
@section('title', 'Update Product')
@section('master-content')
<div class="card">
    <div class="card-header">
        <h3 class="text-info float-left">Update Product</h3>
        <a href="{{ route('product.index') }}" class="btn btn-primary btn-sm float-right">Back Dashboard</a>
    </div>
    <div class="card-body">
        <form action="{{ route('product.update', $product->id) }}" method="POST">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="">Select Category</span></label>
                <select class="form-control" name="category_id" id="">
                    <option value="{{ $product->category_id }}">{{ $product->category->title }}</option>
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->title }}</option>       
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="">Procuct Title</label>
                <input type="text" name="title" id="" class="form-control" value="{{ $product->title }}">
            </div>
            <div class="form-group">
                <label for="">Procuct Description</label>
                <textarea class="form-control" name="description" id="" cols="30" rows="5" placeholder="Enter New Product Description">{{ $product->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="">Procuct Cost Price</label>
                <input type="text" name="cost_price" id="" class="form-control" value="{{ $product->cost_price }}">
            </div>
            <div class="form-group">
                <label for="">Procuct Price</label>
                <input type="text" name="price" id="" class="form-control" value="{{ $product->price }}">
            </div>
            <div class="form-group">
                <input type="submit"  id="" class="form-control btn btn-primary" value="Add Group">
            </div>
        </form>
    </div>
</div>
@endsection