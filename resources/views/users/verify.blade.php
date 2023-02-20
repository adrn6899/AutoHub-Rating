<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ratings</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js" integrity="sha512-lbwH47l/tPXJYG9AcFNoJaTMhGvYWhVM9YI43CT+uteTRRaiLCui8snIgyAN8XWgNjNhCqlAUdzZptso6OCoFQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('js/toastRWithTime.js') }}"></script>
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.css" integrity="sha512-oe8OpYjBaDWPt2VmSFR+qYOdnTjeV9QPLJUeqZyprDEQvQLJ9C5PCFclxwNuvb/GQgQngdCXzKSFltuHD3eCxA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        hr.dashed {
        border-top: 3px dashed #bbb;
        }
        .rate-hover-layer{
            color: orange;
        }
        .rate-select-layer{
            color: orange;
        }
        .navbar{
            background-color: grey !important;
            background-color: blue;
            width: 100%;
            margin: 0 auto;
            position: relative;
            height: 70px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    @include('navbar.sidenav')
    <div class="container-fluid w-100" style="margin-top: 2%;">
        <div class="card answers-card w-80" style="margin: 0 auto;">
            <div class="card-header">
                <h3>{{$system_title[0]->system_name}}</h3>
            </div>
            <div class="card-body overflow-y-scroll" style="height: 300px;">

            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col">
                        {{-- <label for="comment">Comment: </label> --}}
                        <textarea class="mt-1" name="comment" id="comment" cols="50" rows="1" placeholder="Comment Here ..."></textarea>
                    </div>
                    <div class="col">
                        <button class="btn btn-primary" type="submit" style="float: right" id="submitReview">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script>
        var questions = {!!json_encode($questionsArr)!!};
        var t_id = {!!json_encode($t_id)!!};
    </script>
    <script src="{{asset('js/rater.min.js')}}"></script>
    <script src="{{ asset('js/verify.js') }}"></script>
</body>
</html>