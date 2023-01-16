@extends('layouts.master')
@section('content')
<div class="row">
    <div class="col">
    </div>
    <div class="col">
        <button class="btn btn-success btn-add btn-lg">Add</button>
    </div>
</div>
<div class="admin-body-container">
        <table class="table table-dark table-striped" id="systemsTable" style="width:100%">
            
        </table>
    </div>
@endsection
@section('javascript')
    <script src="{{asset('js/system.js')}}"></script>
@endsection