@extends('layouts.master')
@section('css')
    <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet">
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <form action="#" class="template-create">
        <div class="card">
            <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="input-group input-group-lg">
                                <select class="form-select form-select-lg" name="template_name" id="template_name" placeholder="Template Name"></select>
                            </div>
                        </div>
                        <div class="col">
                            <h3>Question List</h3>
                            <div class="questions-list overflow-y-scroll" style="height: 350px">
                                @foreach ($questions as $item)
                                    <div class="form-check">
                                        <input type="checkbox" name="{{$item->title}}" id="{{$item->title}}" value="{{$item->id}}">
                                        <label for="{{$item->title}}" style="font-size: 2rem">{{$item->title}}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success btn-lg float-end" id="submitForm">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
@section('javascript')
    <script src="{{asset('js/questionnaire/create.js')}}"></script>
    <script src="{{asset('js/select2.min.js')}}"></script>
@endsection