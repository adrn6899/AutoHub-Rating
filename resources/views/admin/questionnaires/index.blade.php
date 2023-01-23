@extends('layouts.master')
@section('content')
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="row">
                <div class="col" >
                    <div class="input-group search_input">
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
                    <button class="btn btn-primary btn-add btn-md mt-3" id="reload_list"><i class="bi bi-arrow-clockwise" style="font-size: 1rem; font-weight:bolder;"></i> Reload</button>
                    <button class="btn btn-primary btn-add btn-md mt-3" href="#"><i class="bi bi-plus" style="font-size:1rem; font-weight:bolder;"></i> Create</button>
                </div>
            </div>
            <div class="admin-body-container">
                <table class="table table-bordered table-striped" id="questionnaireTable" style="width:100%">
            
                </table>
            </div>
        </div>
    </div>
</div>
{{-- @include('admin.systems.system_create') --}}
@endsection
@section('javascript')
<script src="{{asset('js/questionnaire.js')}}"></script>
@endsection