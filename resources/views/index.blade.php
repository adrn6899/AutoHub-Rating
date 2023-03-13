@extends('layouts.layout')
@section('css')
    <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/select2.modified.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
    
    <style>
        .floating-icon {
          /* position: absolute;
          right: 5px;
          border-radius: 50%;
          padding: 15px; */
        }
      </style>
@endsection
@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="col">
            <div class="card" style="height:wrap-content">
                <div class="form-control" style="height:65px">
                    <select class="form-control form-select" name="templates_select" id="templates_select">
                        
                    </select>
                </div>
                <canvas id="myChart" width="50" height="15"></canvas>
            </div>
        </div>
    </div>
    <div class="col-md-4 mt-1">
        <div class="row">
            <div class="col-md mb-1">
                <div class="card dashboard-card bg-success">
                    <div class="header">
                        Questions
                    </div>
                    <p style="font-size: 3rem">{{$questions}}</p>
                </div>
            </div>
            <div class="col-md">
                <div class="card dashboard-card bg-warning">
                    <div class="header">
                        Templates
                    </div>
                    <p style="font-size: 3rem">{{$templates}}</p>
                </div>
            </div>
        </div>
        <div class="row mt-1">
            <div class="col-md mb-1">
                <div class="card dashboard-card bg-danger">
                    <div class="header">
                        Systems
                    </div>
                    <p style="font-size: 3rem">{{$systems}}</p>
                </div>
            </div>
            <div class="col-md">
                <div class="card dashboard-card bg-info">
                    <div class="header">
                        Questionnaires
                    </div>
                    <p style="font-size: 3rem">{{$qst}}</p>
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