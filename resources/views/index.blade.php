@extends('layouts.master')
@section('content')
<div class="row">
    <div class="col-md-10">
        <div class="col">
            <div class="card" style="height:250px">
                <div class="form-control">
                    <select class="form-control form-select" name="" id="">
    
                    </select>
                </div>
                <canvas id="myChart"></canvas>
            </div>
        </div>
    </div>
    {{-- <div class="col">
        <div class="row mb-2">
            <div class="col">
                <div class="card bg-success" style="height:100px">
                    <div class="row">
                        <div class="col">
                            <div class="row">
                                <h5>QUESTIONS</h5>
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
                    <p>Templates</p>
                    <p style="font-size: 3rem">{{$templates}}</p>
                </div>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col">
                <div class="card bg-danger" style="height:100px">
                    <p>Systems</p>
                    <p style="font-size: 3rem">{{$systems}}</p>
                </div>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col">
                <div class="card bg-info" style="height:100px">
                    <p>Questionnaires</p>
                    <p style="font-size: 3rem">{{$qst}}</p>
                </div>
            </div>
        </div>    
    </div> --}}
</div>
<div class="row mt-2">
</div>
@endsection
@section('javascript')
    <script src="
    https://cdn.jsdelivr.net/npm/chart.js@4.2.1/dist/chart.umd.min.js
    "></script>
    <script src="{{asset('js/auth/dashboard.js')}}"></script>
@endsection