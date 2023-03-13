@extends('layouts.layout')
@section('css')
@endsection
@section('content')
  {{-- <div class="row">
    <div class="col-lg-6 grid-margin stretch-card">
        <div class="card p-2">
          <div class="row">
            <div class="col"><h3>Question List</h3></div>
            <div class="col">
                <button class="btn btn-sm btn-danger" id="clear_selection" style="float: right">
                    Clear Selection
                </button>
            </div>
          </div>
          <div class="questions-list overflow-y-scroll" style="height: 350px">
              @foreach ($questions as $item)
                  <div class="form-check">
                      <input class="form-check-input mt-1" type="checkbox" name="{{$item->title}}" id="{{$item->title}}" value="{{$item->id}}">
                      <label class="form-check-label" for="{{$item->title}}" style="font-size: 1rem">{{$item->title}}</label>
                  </div>
              @endforeach
          </div>
        </div>
    </div>
    <div class="col-lg-6 grid-margin stretch-card">
        <div class="card p-2">
            <div class="row">
              <h4>Template Name:</h4>
              <div style="height: 305px">
                <div class="input-group input-group-lg mb-3">
                    <input type="text" class="form-control" name="template_name" id="template_name" placeholder="Template Name">
                </div>
              </div>
              <div class="row">
                <div class="col"></div>
                <div class="col">
                  <button class="btn btn-success btn-lg float-end" style="margin-right: -1.5rem">Save</button>
                </div>
              </div>
            </div>
        </div>
    </div>
  </div> --}}
  <div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card p-2 w-100">
          {{-- <div class="row">
          </div> --}}
          <div class="form-group form-group-md mb-3">
              {{-- <label for="template_name">Template Name:</label> --}}
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
              @foreach ($questions as $item)
                  <div class="form-check">
                      <input class="form-check-input mt-1" type="checkbox" name="{{$item->title}}" id="{{$item->title}}" value="{{$item->id}}">
                      <label class="form-check-label" for="{{$item->title}}" style="font-size: 1rem">{{$item->title}}</label>
                  </div>
              @endforeach
          </div>
          <div class="card-footer">
            <button class="btn btn-success btn-lg float-end" style="float:right" id="template_save">Save</button>
          </div>
        </div>
    </div>
  </div>
@endsection
@section('javascript')
  <script src="{{asset('js/toastRWithTime.js')}}"></script>
  <script src="{{asset('js/template/create.js')}}"></script>
@endsection