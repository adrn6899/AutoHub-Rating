@extends('layouts.master')
@section('css')
    <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/select2.modified.css') }}" rel="stylesheet">
    <style>
        .floating-icon {
          position: absolute;
          /* top: -20px; */
          right: 5px;
          /* background-color: white; */
          /* width: 100%;
          height: 100%; */
          border-radius: 50%;
          padding: 15px;
        }
      </style>
@endsection
@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="col">
            <div class="card" style="height:wrap-content">
                <div class="form-control">
                    <select class="form-control form-select" name="templates_select" id="templates_select">
                        
                    </select>
                </div>
                <canvas id="myChart" width="50" height="15"></canvas>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="row">
            <div class="col">
                <div class="row mb-2">
                    <div class="col">
                        <div class="card bg-success" style="height:155px">
                            <div class="row">
                                <div class="col">
                                    <span class="floating-icon">
                                        <i class="bi bi-question-circle" style="font-size: 2rem"></i>
                                    </span>
                                    <div class="row">
                                        <p style="font-size:13px; font-weight:bolder">Questions</p>
                                    </div>
                                    <div class="row">
                                        <center>
                                            <p style="font-size: 3rem">{{$questions}}</p>        
                                        </center>
                                    </div>
                                </div>
                                {{-- <div class="col"> --}}
                                {{-- </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col">
                        <div class="card bg-warning" style="height:155px">
                            <div class="row">
                                <div class="col">
                                    <span class="floating-icon">
                                        <i class="bi bi-list-nested" style="font-size: 2rem"></i>
                                    </span>
                                    <div class="row">
                                        <p style="font-size:13px; font-weight:bolder">Templates</p>
                                    </div>
                                    <div class="row">
                                        <center>
                                            <p style="font-size: 3rem">{{$templates}}</p>
                                        </center>
                                    </div>
                                </div>
                                {{-- <div class="col"> --}}
                                {{-- </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="row mb-2">
                    <div class="col">
                        <div class="card bg-danger" style="height:155px">
                            <div class="row">
                                <div class="col">
                                    <span class="floating-icon">
                                        <i class="bi bi-gear" style="font-size: 2rem"></i>
                                    </span>
                                    <div class="row">
                                        <p style="font-size:13px; font-weight:bolder">Systems</p>
                                    </div>
                                    <div class="row">
                                        <center>
                                            <p style="font-size: 3rem">{{$systems}}</p>
                                        </center>
                                    </div>
                                </div>
                                {{-- <div class="col">
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col">
                        <div class="card bg-info" style="height:155px">
                            <div class="row">
                                <div class="col">
                                    <span class="floating-icon">
                                        <i class="bi bi-ui-checks" style="font-size: 2rem"></i>
                                    </span>
                                    <div class="row">
                                        <p style="font-size:13px; font-weight:bolder">Questionnaires</p>
                                    </div>
                                    <div class="row">
                                        <center>
                                            <p style="font-size: 3rem">{{$qst}}</p>
                                        </center>
                                    </div>
                                </div>
                                {{-- <div class="col">
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>    
            </div>
        </div>
    </div>
</div>
<div class="row mt-2">
</div>
@endsection
@section('javascript')
    <script src="
    https://cdn.jsdelivr.net/npm/chart.js@4.2.1/dist/chart.umd.min.js
    "></script>
    <script src="{{asset('js/auth/dashboard.js')}}"></script>
    <script src="{{asset('js/select2.min.js')}}"></script>
@endsection