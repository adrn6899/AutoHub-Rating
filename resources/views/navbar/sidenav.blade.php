<nav class="navbar bg-body-tertiary fixed-top">
    <div class="container-fluid">
        <div class="row w-100">
            <div class="col-10">
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            <div class="col-2">
                <div class="dropdown mt-1">
                        <a href="#" data-bs-toggle="dropdown" aria-expanded="false" style="text-decoration: none;color:#ffff; margin-left: 50%;">
                            Hi {{Auth::user()->name}}! &nbsp;<i class="bi bi-caret-down-fill" style="font-size:.5rem"></i>
                        </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                  </div>
            </div>
        </div>
        <div class="offcanvas offcanvas-start bg-dark text-light" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Hi Adrian!</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav font-justify-content-end flex-grow-1 pe-3">
                    <li class="nav-item">
                        <a class="nav-link text-white" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  text-white" href="#">Link</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle  text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Dropdown
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item text-black" href="{{url('questionnaires')}}">Questionnaires</a></li>
                            <li><a class="dropdown-item text-black" href="{{url('questions')}}">Questions</a></li>
                            <li><a class="dropdown-item text-black" href="{{url('systems')}}">Systems</a></li>
                            <li><a class="dropdown-item text-black" href="{{url('templates')}}">Templates</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item text-white" href="#">Something else here</a></li>
                        </ul>
                    </li>
                </ul>
                <form class="d-flex mt-3" role="search">
                  <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                  <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </div>
</nav>