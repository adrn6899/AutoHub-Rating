@extends('layouts.layout')
@section('css')
@endsection
@section('content')
  <div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card p-2 w-100">
          {{-- <div class="row">
          </div> --}}
          {{-- <h4>Template Name:</h4> --}}
            <div class="input-group input-group-lg mb-3">
                <input type="text" class="form-control" name="template_name" id="template_name" placeholder="Template Name">
            </div>
          <div class="row">
            <div class="col"><h3>Question List</h3></div>
            <div class="col">
              <button class="btn btn-sm btn-danger" id="clear_selection" style="float: right">
                  Clear Selection
              </button>
              <button class="btn btn-sm btn-primary" id="select_all" style="float: right; margin-right:1rem">
                  Select All
              </button>
            </div>
          </div>
          <div class="questions-list overflow-y-scroll" style="height: 300px">

          </div>
          <div class="card-footer">
            <button class="btn btn-success btn-lg float-end" id="template_save" style="float: right">Save</button>
          </div>
        </div>
    </div>
  </div>
@endsection
@section('javascript')
  <script>
    var template = {!! json_encode($template) !!};
    var questions = {!! json_encode($questions) !!};
  </script>
  <script src="{{asset('js/toastRWithTime.js')}}"></script>
  <script src="{{asset('js/template/edit.js')}}"></script>
@endsection