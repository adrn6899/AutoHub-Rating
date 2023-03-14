@extends('layouts.master')
@section('content')
    <div class="row">
        <div style=" display: flex; align-items: center; justify-content: center; align-conten:center; min-height: 100%;  /* Fallback for browsers do NOT support vh unit */min-height: 100vh;">
            <div class="card">
                <div class="card-header">
                    <center><h3>Login</h3></center>
                </div>
                <div class="card-body">
                    <div class="input-group input-group-lg mb-3">
                        <div class="input-group-prepend input-group-lg custom-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="bi bi-person"></i></span>
                        </div>
                        <input class="form-control" type="text" name="" id="user_name_login" placeholder="Username">
                    </div>
                    <div class="input-group input-group-lg">
                        <div class="input-group-prepend input-group-lg custom-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="bi bi-shield-lock"></i></span>
                        </div>
                        <input class="form-control" type="password" name="" id="user_name_password" placeholder="Password">
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-sm-8">
                            <p class="text-center mt-2" style="font-size: 12px">
                                <a href="/signup">Dont have an account? Register</a>
                            </p>
                        </div>
                        <div class="col align-content-end">
                            <button class="btn btn-success btn-xs mt-1" id="login-btn" style="float: right">
                                Login
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('javascript')
<script src="{{asset('js/auth/login.js')}}"></script>
@endsection