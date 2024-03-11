<header>
    <!-- Navigation bar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <div class="container">
           
            <a href="/"><img src="aset/logo.png" style="height: 75px; width: 75px;" class="nav-link"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Beranda</a>
                    </li>
                </ul>
                {{-- <form class="d-flex flex-grow-1 ms-2" role="search">
                    <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                </form> --}}
                <div class="d-flex ms-auto">
                   
                    <a href="{{url('input')}}"><img src="aset/add.png" style="height: 50px; width: 50px;" class="nav-link"></a>
                    <a href="{{url('profile')}}"><img src="aset/profile.png" style="height: 50px; width: 50px;" class="nav-link"></a>
                    <a class="btn btn-dark" href="{{url('/sesi/logout')}}"><img src="aset/logout.png" style="height: 45px; width:45px;">Log Out</a>

                </div>
            </div>
        </div>
    </nav>
</header>
