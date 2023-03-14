<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,height=device-height,initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{env('APP_NAME')}}</title>
    <style>
        @font-face {
  font-family: 'Poppins';
  font-style: normal;
  font-weight: 300;
  font-display: swap;
  src: url(/fonts.gstatic.com/s/poppins/v20/pxiByp8kv8JHgFVrLDz8Z11lFc-K.woff2) format('woff2');
  unicode-range: U+0900-097F, U+1CD0-1CF6, U+1CF8-1CF9, U+200C-200D, U+20A8, U+20B9, U+25CC, U+A830-A839, U+A8E0-A8FB;
}
/* latin-ext */
@font-face {
  font-family: 'Poppins';
  font-style: normal;
  font-weight: 300;
  font-display: swap;
  src: url(/fonts.gstatic.com/s/poppins/v20/pxiByp8kv8JHgFVrLDz8Z1JlFc-K.woff2) format('woff2');
  unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
}
/* latin */
@font-face {
  font-family: 'Poppins';
  font-style: normal;
  font-weight: 300;
  font-display: swap;
  src: url(/fonts.gstatic.com/s/poppins/v20/pxiByp8kv8JHgFVrLDz8Z1xlFQ.woff2) format('woff2');
  unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
}
/* devanagari */
@font-face {
  font-family: 'Poppins';
  font-style: normal;
  font-weight: 400;
  font-display: swap;
  src: url(/fonts.gstatic.com/s/poppins/v20/pxiEyp8kv8JHgFVrJJbecmNE.woff2) format('woff2');
  unicode-range: U+0900-097F, U+1CD0-1CF6, U+1CF8-1CF9, U+200C-200D, U+20A8, U+20B9, U+25CC, U+A830-A839, U+A8E0-A8FB;
}
/* latin-ext */
@font-face {
  font-family: 'Poppins';
  font-style: normal;
  font-weight: 400;
  font-display: swap;
  src: url(/fonts.gstatic.com/s/poppins/v20/pxiEyp8kv8JHgFVrJJnecmNE.woff2) format('woff2');
  unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
}
/* latin */
@font-face {
  font-family: 'Poppins';
  font-style: normal;
  font-weight: 400;
  font-display: swap;
  src: url(/fonts.gstatic.com/s/poppins/v20/pxiEyp8kv8JHgFVrJJfecg.woff2) format('woff2');
  unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
}
/* devanagari */
@font-face {
  font-family: 'Poppins';
  font-style: normal;
  font-weight: 500;
  font-display: swap;
  src: url(/fonts.gstatic.com/s/poppins/v20/pxiByp8kv8JHgFVrLGT9Z11lFc-K.woff2) format('woff2');
  unicode-range: U+0900-097F, U+1CD0-1CF6, U+1CF8-1CF9, U+200C-200D, U+20A8, U+20B9, U+25CC, U+A830-A839, U+A8E0-A8FB;
}
/* latin-ext */
@font-face {
  font-family: 'Poppins';
  font-style: normal;
  font-weight: 500;
  font-display: swap;
  src: url(/fonts.gstatic.com/s/poppins/v20/pxiByp8kv8JHgFVrLGT9Z1JlFc-K.woff2) format('woff2');
  unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
}
/* latin */
@font-face {
  font-family: 'Poppins';
  font-style: normal;
  font-weight: 500;
  font-display: swap;
  src: url(/fonts.gstatic.com/s/poppins/v20/pxiByp8kv8JHgFVrLGT9Z1xlFQ.woff2) format('woff2');
  unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
}
/* devanagari */
@font-face {
  font-family: 'Poppins';
  font-style: normal;
  font-weight: 600;
  font-display: swap;
  src: url(/fonts.gstatic.com/s/poppins/v20/pxiByp8kv8JHgFVrLEj6Z11lFc-K.woff2) format('woff2');
  unicode-range: U+0900-097F, U+1CD0-1CF6, U+1CF8-1CF9, U+200C-200D, U+20A8, U+20B9, U+25CC, U+A830-A839, U+A8E0-A8FB;
}
/* latin-ext */
@font-face {
  font-family: 'Poppins';
  font-style: normal;
  font-weight: 600;
  font-display: swap;
  src: url(/fonts.gstatic.com/s/poppins/v20/pxiByp8kv8JHgFVrLEj6Z1JlFc-K.woff2) format('woff2');
  unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
}
/* latin */
@font-face {
  font-family: 'Poppins';
  font-style: normal;
  font-weight: 600;
  font-display: swap;
  src: url(/fonts.gstatic.com/s/poppins/v20/pxiByp8kv8JHgFVrLEj6Z1xlFQ.woff2) format('woff2');
  unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
}
/* devanagari */
@font-face {
  font-family: 'Poppins';
  font-style: normal;
  font-weight: 700;
  font-display: swap;
  src: url(/fonts.gstatic.com/s/poppins/v20/pxiByp8kv8JHgFVrLCz7Z11lFc-K.woff2) format('woff2');
  unicode-range: U+0900-097F, U+1CD0-1CF6, U+1CF8-1CF9, U+200C-200D, U+20A8, U+20B9, U+25CC, U+A830-A839, U+A8E0-A8FB;
}
/* latin-ext */
@font-face {
  font-family: 'Poppins';
  font-style: normal;
  font-weight: 700;
  font-display: swap;
  src: url(/fonts.gstatic.com/s/poppins/v20/pxiByp8kv8JHgFVrLCz7Z1JlFc-K.woff2) format('woff2');
  unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
}
/* latin */
@font-face {
  font-family: 'Poppins';
  font-style: normal;
  font-weight: 700;
  font-display: swap;
  src: url(/fonts.gstatic.com/s/poppins/v20/pxiByp8kv8JHgFVrLCz7Z1xlFQ.woff2) format('woff2');
  unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
}
/* devanagari */
@font-face {
  font-family: 'Poppins';
  font-style: normal;
  font-weight: 800;
  font-display: swap;
  src: url(/fonts.gstatic.com/s/poppins/v20/pxiByp8kv8JHgFVrLDD4Z11lFc-K.woff2) format('woff2');
  unicode-range: U+0900-097F, U+1CD0-1CF6, U+1CF8-1CF9, U+200C-200D, U+20A8, U+20B9, U+25CC, U+A830-A839, U+A8E0-A8FB;
}
/* latin-ext */
@font-face {
  font-family: 'Poppins';
  font-style: normal;
  font-weight: 800;
  font-display: swap;
  src: url(/fonts.gstatic.com/s/poppins/v20/pxiByp8kv8JHgFVrLDD4Z1JlFc-K.woff2) format('woff2');
  unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
}
/* latin */
@font-face {
  font-family: 'Poppins';
  font-style: normal;
  font-weight: 800;
  font-display: swap;
  src: url(/fonts.gstatic.com/s/poppins/v20/pxiByp8kv8JHgFVrLDD4Z1xlFQ.woff2) format('woff2');
  unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
}
/* devanagari */
@font-face {
  font-family: 'Poppins';
  font-style: normal;
  font-weight: 900;
  font-display: swap;
  src: url(/fonts.gstatic.com/s/poppins/v20/pxiByp8kv8JHgFVrLBT5Z11lFc-K.woff2) format('woff2');
  unicode-range: U+0900-097F, U+1CD0-1CF6, U+1CF8-1CF9, U+200C-200D, U+20A8, U+20B9, U+25CC, U+A830-A839, U+A8E0-A8FB;
}
/* latin-ext */
@font-face {
  font-family: 'Poppins';
  font-style: normal;
  font-weight: 900;
  font-display: swap;
  src: url(/fonts.gstatic.com/s/poppins/v20/pxiByp8kv8JHgFVrLBT5Z1JlFc-K.woff2) format('woff2');
  unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
}
/* latin */
@font-face {
  font-family: 'Poppins';
  font-style: normal;
  font-weight: 900;
  font-display: swap;
  src: url(/fonts.gstatic.com/s/poppins/v20/pxiByp8kv8JHgFVrLBT5Z1xlFQ.woff2) format('woff2');
  unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
}
    </style>

    <script src="{{asset('js/jquery.js')}}"></script>
    <script src="{{ asset('js/jquery.datatables.min.js') }}"></script>
    <script src="{{ asset('js/datatables.bootstrap5.min.js') }}"></script>
    <script src="{{asset('js/layout/popper.min.js')}}"></script>
    <script src="{{asset('js/layout/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>
    <script src="{{ asset('js/swal.js') }}"></script>
    <script src="{{ asset('js/toastRWithTime.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js" integrity="sha512-lbwH47l/tPXJYG9AcFNoJaTMhGvYWhVM9YI43CT+uteTRRaiLCui8snIgyAN8XWgNjNhCqlAUdzZptso6OCoFQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script defer src="https://static.cloudflareinsights.com/beacon.min.js/vaafb692b2aea4879b33c060e79fe94621666317369993" integrity="sha512-0ahDYl866UMhKuYcW078ScMalXqtFJggm7TmlUtp0UlD4eQk0Ixfnm5ykXKvGJNFjLMoortdseTfsRT8oCfgGA==" data-cf-beacon='{"rayId":"7a49857a2b43e550","token":"cd0b4b3a733644fc843ef0b185f98241","version":"2023.2.0","si":100}' crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    <link href="{{ asset('css/datatables.bootstrap5.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.css" integrity="sha512-oe8OpYjBaDWPt2VmSFR+qYOdnTjeV9QPLJUeqZyprDEQvQLJ9C5PCFclxwNuvb/GQgQngdCXzKSFltuHD3eCxA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>
    @yield('css')
    <div class="wrapper d-flex align-items-stretch">
        @include('navbar.navbar')
        
        <div id="content" class="p-md-3">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <button type="button" id="sidebarCollapse" class="btn btn-dark">
                        <i class="fa fa-bars"></i>
                        <span class="sr-only">Toggle Menu</span>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fa fa-sort-desc" aria-hidden="true"></i>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            {{-- <li class="nav-item active">
                              <a class="nav-link" href="#">Home</a>
                            </li>
                            <li class="nav-item active">
                              <a class="nav-link" href="#">About</a>
                            </li>
                            <li class="nav-item active">
                              <a class="nav-link" href="#">Portfolio</a>
                            </li> --}}
                            <li class="nav-item">
                              <div class="btn-group dropstart nav-link">
                                <button class="btn btn-outline-light btn-sm" type="button" style="color: black; margin-top: -3px">
                                  {{Auth::user()->f_name}}
                                </button>
                                <button type="button" class="btn btn-sm btn-outline-light dropdown-toggle dropdown-toggle-split" style="color: black" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <div class="dropdown-menu" style="position:absolute;right:auto;">
                                  {{-- <a class="dropdown-item" href="#">Action</a>
                                  <a class="dropdown-item" href="#">Another action</a>
                                  <a class="dropdown-item" href="#">Something else here</a> --}}
                                  <div class="dropdown-divider"></div>
                                  {{-- <a class="dropdown-item" href="#"> --}}
                                    <form method="POST" action="{{url('/customLogout')}}">
                                      @csrf
                                      <button class="dropdown-item" style="text-align:left">Logout<i class="fa fa-sign-out mt-1" aria-hidden="true" style="float:right"></i></button>
                                    </form>
                                  {{-- </a> --}}
                                </div>
                              </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        
            @yield('content')

    </div>
    @yield('javascript')
    {{-- <footer >
      All rights reserved
    </footer> --}}
    <script src="{{asset('js/layout/main.js')}}"></script>
</body>
</html>