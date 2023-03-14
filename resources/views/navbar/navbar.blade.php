<nav id="sidebar" class="active bg-dark">
    <h1>
        <a href="/" class="logo">    
            <img class="img-fluid mx-auto" src="{{asset('files/img/AGC_TRANSPARENT.png')}}" alt="" style="filter:invert(1)">
        </a>
    </h1>
        <ul class="list-unstyled components mb-5">
            <li class="active">
                <a href="/"><span class="fa fa-home"></span> Home</a>
            </li>
            <li>
                <a href="{{url('questionnaires')}}"><span class="fa fa-folder-open-o"></span> Questionnaires</a>
            </li>
            <li>
                <a href="{{url('questions')}}"><span class="fa fa-question"></span> Questions</a>
            </li>
            <li>
                <a href="{{url('reports')}}"><span class="fa fa-newspaper-o"></span> Reports</a>
            </li>
            <li>
                <a href="{{url('systems')}}"><span class="fa fa-cogs"></span> Systems</a>
            </li>
            <li>
                <a href="{{url('templates')}}"><span class="fa fa-file-text-o"></span> Templates</a>
            </li>
        </ul>
    <div class="footer">
        <p>
            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved. 
            {{-- This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib.com</a> --}}
        </p>
    </div>
</nav>