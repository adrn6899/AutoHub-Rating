@extends('layouts.layout')
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/themes/default/style.min.css" />
@endsection
@section('content')
    <div class="row">
        <div class="col-md-2" id="js_tree">
            <ul>
                <li>Questionnaires
                    <ul>
                        <li value="/questionnaires_masterfile">Masterfile</li>
                    </ul>
                </li>
                <li>Questions
                    <ul>
                        <li value="/questions_masterfile">Masterfile</li>
                    </ul>
                </li>
                <li>Systems
                    <ul>
                        <li value="/systems_masterfile">Masterfile</li>
                    </ul>
                </li>
                <li>Templates
                    <ul>
                        <li value="/templates_masterfile">Masterfile</li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="col-md-10" style="max-width: 100%; max-height:100%">
            <iframe name="reports_display" id="reports_display" src="#" class="w-100" style="height:400px; background-color:inherit">
                
            </iframe>
        </div>
    </div>
@endsection
@section('javascript')
    <script src="{{'js/auth/reports.js'}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/jstree.min.js"></script>
@endsection