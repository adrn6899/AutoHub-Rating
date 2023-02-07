@extends('layouts.master')
@section('content')
<div class="row">
    <div class="col">
        <div class="card bg-success" style="height:150px">
            <p style="font-size: 4rem">{{$questions}}</p>
        </div>
    </div>
    <div class="col">
        <div class="card bg-warning" style="height:150px">
            {{$templates}}
        </div>
    </div>
    <div class="col">
        <div class="card bg-danger" style="height:150px">
            <p style="font-size: 5rem">{{$systems}}</p>
        </div>
    </div>
    <div class="col">
        <div class="card bg-info" style="height:150px">

        </div>
    </div>
</div>
<div class="row mt-2">
    <div class="col-md-12">
        <div class="card" style="height:250px">
            
        </div>
    </div>
</div>
@endsection
@section('javascript')
    {{-- <script>var rating = {{!! json_encode($rating,JSON_HEX_TAG) !!}}</script> --}}
@endsection