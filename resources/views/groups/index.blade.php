@extends('layouts.master')

@section('ttile', 'Dashboard')

@section('master-content')
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h3 class="m-0 font-weight-bold text-primary float-left">All Groups</h3>
            <a href="{{ route('group.create') }}" class="btn btn-primary btn-sm float-right"><i class="fa fa-plus"></i> Add Groups</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Actions</th>
                            </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Actions</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($groups as $group )
                        <tr>
                            <td>{{ $group->id }}</td>
                            <td>{{ $group->title }}</td>
                            <td>
                                <a class="btn btn-primary btn-sm" href="{{ route('group.edit', $group->id) }}"><i class="fa fa-pencil-alt"></i></a>
                                <a class="btn btn-info btn-sm" href="{{ route('group.show', $group->id) }}"><i class="fa fa-eye"></i></a>
                                <form class="d-inline" action="{{ route('group.destroy', $group->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick=" return confirm('Are you Sure Delete This Data?')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
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
