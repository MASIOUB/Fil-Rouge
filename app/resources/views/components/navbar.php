<nav class="navbar fixed-top navbar-expand-lg" style="background: #081f3e;">
        <div class="container text-white">
            <a class="navbar-brand text-white" href="<?= createLink("/") ?>"><span style="color: #077bd4;">Enjoy</span>Travel</a>
            <button class="navbar-toggler text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"><i class="fas fa-bars"></i></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= createLink("/") ?>">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= createLink("user/agency") ?>">Agencies</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= createLink("user/trip") ?>">Packages</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= createLink("about") ?>">About</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="<?= createLink("choose") ?>">Login</a>
                    </li> -->
                </ul>
            </div>
        </div>
    </nav>