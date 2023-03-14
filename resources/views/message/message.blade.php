@extends('layouts.layout')
@section('content')
<div style=" display: flex; align-items: center; justify-content: center; align-conten:center; min-height: 100%;  /* Fallback for browsers do NOT support vh unit */min-height: 100vh;">
    <div class="card bg-light p-3">
        <img class="mx-auto" src="{{asset('files/img/AGC_TRANSPARENT.png')}}" alt="">
        <div class="card-body">
            {!! $message !!}
        </div>
    </div>
</div>
@endsection