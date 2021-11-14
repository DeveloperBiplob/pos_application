@extends('layouts.master')
@section('tilte', 'Show User')
@section('master-content')
<div class="row">
    <div class="col-md-3">
            <a href="{{ route('user.index') }}" class="btn btn-danger btn-sm"><i class="fa fa-arrow-left"></i> Back Dashboard</a>
    </div>
    <div class="col-md-9">
        <div class="float-right">
            <a href="{{ route('user.index') }}" class="btn btn-primary btn-sm" style="width:150px">New Sale</a>
            <a href="{{ route('user.index') }}" class="btn btn-primary btn-sm" style="width:150px">New Purchase</a>
            <a href="{{ route('user.index') }}" class="btn btn-primary btn-sm" style="width:150px">New payment</a>
            <a href="{{ route('user.index') }}" class="btn btn-primary btn-sm" style="width:150px">New Receipt</a>
        </div>
    </div>
</div>

<div class="row  mt-5">
    <div class="col-3">
      <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
        <a href="{{ route('user.show', $user->id) }}" class="nav-link {{ Route::is('user.show') ? 'active' : '' }}" >User Details</a>
        <a href="{{ route('user.sale', $user->id) }}" class="nav-link {{ Route::is('user.sale') ? 'active' : '' }}" >Sale</a>
        <a href="{{ route('user.purchases', $user->id) }}" class="nav-link {{ Route::is('user.purchases') ? 'active' : '' }}" >purchase</a>
        <a href="{{ route('user.payments', $user->id) }}" class="nav-link {{ Route::is('user.payments') ? 'active' : '' }}" >Payment</a>
        <a href="{{ route('user.receipts', $user->id) }}" class="nav-link {{ Route::is('user.receipts') ? 'active' : '' }}" >Receipt</a>
      </div>
    </div>
    <div class="col-9">
        @yield('user_content')
    </div>
  </div>
@endsection

