@extends('layouts.app')
@section('title', 'Admin Register')
@section('app-content')
    <div class="row">
        <div class="col-md-3 d-inline-block m-auto">
            <div class="card mt-5">
                <div class="car-header text-center mt-5">
                    <h3>Admin Register</h3>
                </div>
                <div class="card-body">     
                    <form action="{{ route('register') }}" method="post">
                        @csrf
                      <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Full name" name="name">
                        <div class="input-group-append">
                          <div class="input-group-text">
                            <span class="fas fa-user"></span>
                          </div>
                        </div>
                      </div>
                      @error('name')
                          <span class="text-danger">{{ $message }}</span>
                      @enderror
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
                        <input type="text" class="form-control" placeholder="Enter Yur Address" name="address">
                        <div class="input-group-append">
                          <div class="input-group-text">
                            <span class="fas fa-user"></span>
                          </div>
                        </div>
                      </div>
                      <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Enter Your Phone Number" name="phone">
                        <div class="input-group-append">
                          <div class="input-group-text">
                            <span class="fas fa-user"></span>
                          </div>
                        </div>
                      </div>
                      <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Password" name="password">
                        <div class="input-group-append">
                          <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                          </div>
                        </div>
                      </div>
                      @error('password')
                      <span class="text-danger">{{ $message }}</span>
                      @enderror
                      <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Retype password" name="con_password">
                        <div class="input-group-append">
                          <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                          </div>
                        </div>
                      </div>
                      @error('con_password')
                      <span class="text-danger">{{ $message }}</span>
                      @enderror
                      <div class="row">
                          <button type="submit" class="btn btn-primary btn-block mr-2 ml-2">Register</button>
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
                </div>
                <!-- /.social-auth-links -->
                <p class="m-3">
                <a href="{{ route('login') }}" class="text-center">Login</a>
                </p>
            </div>
        </div>
    </div>
@endsection