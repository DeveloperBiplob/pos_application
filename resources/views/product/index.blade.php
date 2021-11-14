@extends('layouts.master')

@section('ttile', 'Dashboard')

@section('master-content')
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h3 class="m-0 font-weight-bold text-primary float-left">All Products</h3>
            <a href="{{ route('product.create') }}" class="btn btn-primary btn-sm float-right">Add Product</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <tr>
                                <th>ID</th>
                                <th>Category</th>
                                <th>Product</th>
                                <th>Descriptin</th>
                                <th>Cost Price</th>
                                <th>Price</th>
                                <th>Actions</th>
                            </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Category</th>
                            <th>Product</th>
                            <th>Descriptin</th>
                            <th>Cost Price</th>
                            <th>Price</th>
                            <th>Actions</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($products as $product )
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->category->title ?? '' }}</td>
                            <td>{{ $product->title }}</td>
                            <td>{{ $product->description }}</td>
                            <td>{{ $product->cost_price }}</td>
                            <td>{{ $product->price }}</td>
                            <td>
                                <a class="btn btn-primary btn-sm" href="{{ route('product.edit', $product->id) }}">Edit</a>
                                <a class="btn btn-info btn-sm" href="{{ route('product.show', $product->id) }}">view</a>
                                <form class="d-inline" action="{{ route('product.destroy', $product->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick=" return confirm('Are you Sure Delete This Data?')" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach 
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection