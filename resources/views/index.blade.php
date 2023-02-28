@extends('layouts.master')
@section('css')
    <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/select2.modified.css') }}" rel="stylesheet">
@endsection
@section('content')
<div class="row">
    <div class="col-md-10">
        <div class="col">
            <div class="card" style="height:wrap-content">
                <div class="form-control">
                    <select class="form-control form-select" name="templates_select" id="templates_select">
                        
                    </select>
                </div>
                <canvas id="myChart" width="50" height="10"></canvas>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="row mb-2">
            <div class="col">
                <div class="card bg-success" style="height:100px">
                    <div class="row">
                        <div class="col">
                            <div class="row">
                                <h6>QUESTIONS</h6>
                            </div>
                            <div class="row">
                                <p style="font-size: 3rem">{{$questions}}</p>        
                            </div>
                        </div>
                        <div class="col">
                            <i class="bi bi-question-square" style="font-size: 4rem"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col">
                <div class="card bg-warning" style="height:100px">
                    <div class="row">
                        <div class="col">
                            <div class="row">
                                <h6>Templates</h6>
                            </div>
                            <div class="row">
                                <p style="font-size: 3rem">{{$templates}}</p>
                            </div>
                        </div>
                        <div class="col">
                            <i class="bi bi-list-nested" style="font-size: 4rem"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col">
                <div class="card bg-danger" style="height:100px">
                    <div class="row">
                        <div class="col">
                            <div class="row">
                                <h6>Systems</h6>
                            </div>
                            <div class="row">
                                <p style="font-size: 3rem">{{$systems}}</p>
                            </div>
                        </div>
                        <div class="col">
                            <i class="bi bi-gear" style="font-size: 4rem"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col">
                <div class="card bg-info" style="height:100px">
                    <div class="row">
                        <div class="col">
                            <div class="row">
                                <p style="font-size:13px; font-weight:bolder">Questionnaires</p>
                            </div>
                            <div class="row">
                                <p style="font-size: 3rem">{{$qst}}</p>
                            </div>
                        </div>
                        <div class="col">
                            <i class="bi bi-chat-left-text" style="font-size: 4rem"></i>
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