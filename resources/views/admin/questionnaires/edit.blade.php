@extends('layouts.layout')
@section('css')
    <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/select2.modified.css') }}" rel="stylesheet">
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <form action="#" class="template-edit">
        <div class="card">
            <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h4>Template Name:</h4>
                            <div class="input-group input-group-lg mb-3">
                                <input type="text" id="edit_template_name" class="form-control form-control-lg" disabled>
                            </div>
                            <h4>System Name:</h4>
                            <div class="input-group input-group-lg mb-3">
                                <input type="text" id="edit_system_name" class="form-control form-control-lg" disabled>
                            </div>
                            <h4>Survey Link:</h4>
                            <div class="input-group input-group-lg mb-3">
                                <input type="text" id="edit_link" class="form-control form-control-lg" disabled>
                                <button class="btn btn-outline-secondary" type="button" id="copy_link"><i class="fa fa-clipboard" aria-hidden="true"></i></button>
                            </div>
                        </div>
                        <div class="col">
                            <div class="row">
                                <div class="col"><h3>Question List</h3></div>
                                {{-- <div class="col">
                                    <button class="btn btn-sm btn-danger" id="clear_selection" style="float: right">
                                        Clear Selection
                                    </button>
                                </div> --}}
                            </div>
                            <div class="questions-list overflow-y-scroll pre-scrollable p-3" style="height: 350px">
                               <ul class="questions-ul">

                               </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col">
                            <button type="button" class="btn btn-danger btn-lg float-start" id="cancelAction">Back</button>
                        </div>
                        {{-- <div class="col">
                            <button type="submit" class="btn btn-success btn-lg float-end" id="submitForm">Submit</button>
                        </div> --}}
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
@section('javascript')
    <script src="{{asset('js/questionnaire/edit.js')}}"></script>
    <script src="{{asset('js/select2.min.js')}}"></script>
    <script>
        var template_id = {!!json_encode($tmp_id,JSON_HEX_TAG)!!}
        var system_id = {!!json_encode($sys_id,JSON_HEX_TAG)!!}
    </script>
@endsection