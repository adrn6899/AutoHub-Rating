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
                            <div class="input-group-prepend input-group-lg custom-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="bi bi-person"></i></span>
                            </div>
                            <input class="form-control" type="text" name="f_name" id="register_fname" placeholder="First Name">
                        </div>
                        <div class="input-group input-group-lg mb-3">
                            <div class="input-group-prepend input-group-lg custom-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="bi bi-person-fill"></i></span>
                            </div>
                            <input class="form-control" type="text" name="l_name" id="register_lname" placeholder="Last Name">
                        </div>
                        <div class="input-group input-group-lg mb-3">
                            <div class="input-group-prepend input-group-lg custom-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="bi bi-envelope-at"></i></span>
                            </div>
                            <input class="form-control" type="email" name="email" id="register_email" placeholder="Email">
                        </div>
                        <div class="input-group input-group-lg mb-3">
                            <div class="input-group-prepend input-group-lg custom-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="bi bi-shield-lock"></i></span>
                            </div>
                            <input class="form-control" type="password" name="password" id="register_password" placeholder="Password">
                        </div>
                        <div class="input-group input-group-lg">
                            <div class="input-group-prepend input-group-lg custom-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="bi bi-shield-lock-fill"></i></span>
                            </div>
                            <input class="form-control" type="password" name="password_confirmation" id="register_confirm_password" placeholder="Confirm Password">
                        </div>
                    </div>
                </form>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col">
                                <button type="button" class="btn btn-danger btn-xs" id="cancel-btn" style="float: left">
                                    Cancel
                                </button>
                            </div>
                            <div class="col align-content-end">
                                <button type="submit" class="btn btn-success btn-xs" id="register-btn" style="float: right">
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
<script src="{{asset('js/auth/registration.js')}}"></script>
{{-- <script src="{{asset('js/toastRWithTime.js')}}"></script> --}}
@endsection