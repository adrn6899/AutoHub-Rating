@extends('layouts.master')
@section('content')
<div class="row">
    <div class="col">
        <div class="input-group mt-2">
            <div class="input-group-append cursor">
                <div class="input-group-text  px-1 border  form-control-sm">
                    <div class="tooltip-me" title="Filter by category">
                        <button type="button" class="btn btn-sm dropdown-toggle"
                            data-bs-toggle="dropdown">
                            <i class="fas fa-search"></i>
                            <u>Search</u>
                        </button>
                        <ul class="dropdown-filter system-search-type dropdown-menu cursor">

                        </ul>
                    </div>
                </div>
            </div>
            <input type="text" class="form-control txt_search" placeholder="Search" aria-label="Recipient's username" aria-describedby="basic-addon2" id="system_search">
            {{-- <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="button"><i class="bi bi-search"></i></button>
            </div> --}}
        </div>
    </div>
    <div class="col">
        <button class="btn btn-success btn-add btn-lg mt-2">Add</button>
    </div>
</div>
<div class="admin-body-container">
        <table class="table table-light table-striped" id="systemsTable" style="width:100%">
            
        </table>
    </div>
@endsection
@section('javascript')
    <script src="{{asset('js/system.js')}}"></script>
@endsection