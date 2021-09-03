@extends('layouts.master')
@section('tilte', 'Show Prodoct')
@section('master-content')
    <div class="card">
        <div class="card-header">
            <h3 class="text-info float-left">Show Product</h3>
            <a href="{{ route('product.index') }}" class="btn btn-primary btn-sm float-right">Back Dashboard</a>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>ID</th>
                    <td>{{ $product->id }}</td>
                </tr>
                <tr>
                    <th>Categoy</th>
                    <td>{{ $product->category->title }}</td>
                </tr>
                <tr>
                    <th>Product</th>
                    <td>{{ $product->title }}</td>
                </tr>
                <tr>
                    <th>Description</th>
                    <td>{{ $product->description }}</td>
                </tr>
                <tr>
                    <th>Cost Price</th>
                    <td>{{ $product->cost_price }}</td>
                </tr>
                <tr>
                    <th> Price</th>
                    <td>{{ $product->price }}</td>
                </tr>
            </table>
        </div>
    </div>
@endsection