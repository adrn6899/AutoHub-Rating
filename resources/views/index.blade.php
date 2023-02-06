@extends('layouts.master')
@section('content')
<div class="row">
    {{-- {{$rating}} --}}
</div>
@endsection
@section('javascript')
    <script>var rating = {{!! json_encode($rating,JSON_HEX_TAG) !!}}</script>
@endsection