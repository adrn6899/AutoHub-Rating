{{-- @extends('layouts.master') --}}
@extends('layouts.layout')
@section('content')
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="row mb-2">
            <div class="col-md-8">
                <div class="input-group search_input">
                    <div class="input-group-append cursor">
                        <div class="input-group-text  px-1 border  form-control-sm questions_search">
                            <div class="tooltip-me" title="Filter by category">
                                <button type="button" class="btn btn-sm dropdown-toggle p-3"
                                    data-bs-toggle="dropdown" style="height:100px !important;">
                                    <i class="fa fa-search" aria-hidden="true"></i>
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
            <div class="col-md-4">
                <button class="btn btn-primary btn-add btn-md" style="float:right" id="reload_list"><i class="fa fa-refresh" aria-hidden="true"></i> Reload</button>
                <button class="btn btn-primary btn-add btn-md mr-2" style="float:right" data-toggle="modal" data-target="#systemModal"><i class="fa fa-plus" aria-hidden="true"></i> Create</button>
            </div>
        </div>
        <div class="card p-3">
            <div class="admin-body-container">
                <table class="table table-bordered table-striped" id="systemsTable" style="width:100%">
            
                </table>
            </div>
        </div>
    </div>
</div>
@include('admin.systems.system_create')
@endsection
@section('javascript')
<script src="{{asset('js/system.js')}}"></script>
@endsection