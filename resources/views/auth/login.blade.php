@extends('layouts.app')
@section('title', 'Admin Login')
@section('app-content')
    <div class="row">
        <div class="col-md-2 d-inline-block m-auto">
            <div class="card mt-5">
                <div class="car-header text-center mt-5">
                    <h3>Admin Login</h3>
                </div>
                <div class="card-body">     
                <form action="{{ route('login') }}" method="post">
                    @csrf
                <div class="input-group mb-3">
                    <input type="email" class="form-control" placeholder="Email" name="email">
                    <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                    </div>
                    </div>
                </div>
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <div class="input-group mb-3">
                    <input type="password" class="form-control" placeholder="Password" name="password">
                    <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                    </div>
                </div>
                @error('email')
                <span class="text-danger">{{ $message }}</span>
                 @enderror
                <div class="row">
                    <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                    <!-- /.col -->
                </div>
                </form>
        
                <div class="social-auth-links text-center mb-3">
                <p>- OR -</p>
                <a href="#" class="btn btn-block btn-primary">
                    <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
                </a>
                <a href="#" class="btn btn-block btn-danger">
                    <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
                </a>
                </div>
                <!-- /.social-auth-links -->
        
                <p class="mb-1">
                <a href="">I forgot my password</a>
                </p>
                <p class="mb-0">
                <a href="{{ route('register') }}" class="text-center">Register</a>
                </p>
            </div>
        </div>
    </div>
@endsection