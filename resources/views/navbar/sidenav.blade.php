<nav class="navbar bg-body-tertiary fixed-top">
    <div class="container-fluid">
        <div class="row w-100">
            <div class="col-8">
                @if(Auth::user()->type == "admin")
                    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                @endif
            </div>
            <div class="col-4">
                <div class="row" style="width: 100%">
                    <div style="width:50%">

                    </div>
                    <div style="width:30%; float:right">
                        <div class="dropdown mt-1 justify-content-start">
                            <a href="#" data-bs-toggle="dropdown" aria-expanded="false" style="text-decoration: none;color:#ffff; margin-left: 20%;">
                                Hi {{Auth::user()->f_name}}! &nbsp;<i class="bi bi-caret-down-fill" style="font-size:.5rem"></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Profile</a></li>
                                <li><a class="dropdown-item" href="#">Settings</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <form method="POST" action="{{url('/customLogout')}}">
                                        @csrf
                                        <button class="dropdown-item">Logout</button>
                                    </form>
                                </li>
                            </ul>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
        <div class="offcanvas offcanvas-start bg-dark text-light" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Hi Adrian!</h5>
                <button type="button" class="btn-close bg-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav font-justify-content-end flex-grow-1 pe-3">
                    <li class="nav-item">
                        <a class="nav-link text-white" aria-current="page" href="#"><i class="bi bi-house-door" style="font-size: 1.5rem"></i> Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  text-white" href="{{url('reports')}}"><i class="bi bi-folder2" style="font-size: 1.5rem"></i> Reports</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  text-white" href="{{url('questionnaires')}}"><i class="bi bi-chat-left-text" style="font-size: 1.5rem"></i> Questionnaires</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  text-white" href="{{url('questions')}}"><i class="bi bi-question-square" style="font-size: 1.5rem"></i> Questions</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  text-white" href="{{url('systems')}}"><i class="bi bi-gear" style="font-size: 1.5rem"></i> Systems</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  text-white" href="{{url('templates')}}"><i class="bi bi-list-nested" style="font-size: 1.5rem"></i> Templates</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>