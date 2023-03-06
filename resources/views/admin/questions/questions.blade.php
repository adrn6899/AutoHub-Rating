@extends('layouts.master')
@section('content')
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="row" style="height: 100%">
                <div class="col" >
                    <div class="input-group search_input">
                        <div class="input-group-append cursor">
                            <div class="input-group-text  px-1 border  form-control-sm questions_search">
                                <div class="tooltip-me" title="Filter by category">
                                    <button type="button" class="btn btn-sm dropdown-toggle"
                                        data-bs-toggle="dropdown" id="questions_search">
                                        <i class="bi bi-search"></i>
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
                    <button class="btn btn-primary btn-add btn-md mt-3" id="reload_list"><i class="bi bi-arrow-clockwise" style="font-size: 1rem; font-weight:bolder;"></i> Reload</button>
                    <button class="btn btn-primary btn-add btn-md mt-3" data-bs-toggle="modal" data-bs-target="#questionModal"><i class="bi bi-plus-lg"></i> Create</button>
                </div>
            </div>
            <div class="admin-body-container">
                <table class="table table-bordered table-striped" id="questionsTable" style="width:100%">
            
                </table>
            </div>
        </div>
    </div>
</div>
@include('admin.questions.question_create')
@endsection
@section('javascript')
    <script src="{{asset('js/question.js')}}"></script>
@endsection