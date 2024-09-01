<nav class="navbar navbar-expand-lg navbar-dark" height="71px" style="background: #3D405B">
    <div class="container-fluid">
        <a style="margin-left: 30px" class="navbar-brand logo" href="/dashboard"><img draggable="false" src="{{asset('assets/kotak.png')}}" class="mx-2" width="32px" height="32px" alt="logo"> LOGO</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div style="margin-left: 80px" class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item me-3">
                    <a class="nav-link active" aria-current="page" href="/jobs">Jobs</a>
                </li>
                <li class="nav-item me-3">
                    <a class="nav-link active" href="#">Candidates</a>
                </li>
                <li class="nav-item me-3">
                    <a class="nav-link active" href="#">Hiring</a>
                </li>
                <li class="nav-item me-3">
                    <a class="nav-link active" href="#">Cancel Join</a>
                </li>
                <li class="nav-item me-3 dropdown">
                    <a class="nav-link active" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Report <i class="bi bi-chevron-down"></i>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="#">Hiring</a></li>
                        <li><a class="dropdown-item" href="#">Job Order</a></li>
                    </ul>
                </li>
                <li class="nav-item me-3">
                    <a class="nav-link active" href="#">Calendar</a>
                </li>
            </ul>
            <div class="justify-content-end">
                <ul class="nav navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="#"><i class="bi bi-bell-fill"></i> Notification</a>
                    </li>
                    <img draggable="false" src="{{ asset('assets/pemisah.svg') }}" alt="" class="d-none d-lg-block mx-2">
                    <li class="nav-item dropdown">
                        <a class="nav-link active" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-person-fill"></i> nisa@ish.com  <i class="bi bi-chevron-down"></i>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    </nav>