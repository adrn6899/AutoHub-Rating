@extends('layouts.master')
@section('content')
    <div class="row">
        <div style=" display: flex; align-items: center; justify-content: center; align-conten:center; min-height: 100%;  /* Fallback for browsers do NOT support vh unit */min-height: 100vh;">
            <form action="#" class="register_user">
                <div class="card card-registration">
                    <div class="card-header">
                        <center><h3>Register</h3></center>
                    </div>
                    <div class="card-body">
                        <div class="input-group input-group-lg mb-3">
                            <input class="form-control border-0 border-bottom" type="text" name="name" id="register_name" placeholder="user name">
                        </div>
                        <div class="input-group input-group-lg mb-3">
                            <input class="form-control border-0 border-bottom" type="email" name="email" id="register_email" placeholder="email">
                        </div>
                        <div class="input-group input-group-lg mb-3">
                            <input class="form-control @error('password') is-invalid @enderror border-0 border-bottom" type="password" name="password" id="register_password" placeholder="password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="input-group input-group-lg">
                            <input class="form-control border-0 border-bottom" type="password" name="password_confirmation" id="register_confirm_password" placeholder="confirm password">
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col">
    
                            </div>
                            <div class="col align-content-end">
                                <button class="btn btn-success btn-xs" id="register-btn" style="float: right">
                                    Login
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('javascript')
<script src="{{asset('js/auth/registration.js')}}"></script>
{{-- <script src="{{asset('js/toastRWithTime.js')}}"></script> --}}
@endsection