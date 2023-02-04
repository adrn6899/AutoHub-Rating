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
                        <input class="form-control" type="text" name="" id="user_name_login" placeholder="ASA ID">
                    </div>
                    {{-- <div class="input-group input-group-lg">
                        <input class="form-control" type="password" name="" id="user_name_password" placeholder="user name">
                    </div> --}}
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col">

                        </div>
                        <div class="col align-content-end">
                            <button class="btn btn-success btn-xs" id="login-btn" style="float: right">
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
<script src="{{asset('js/auth/employeeLogin.js')}}"></script>
@endsection