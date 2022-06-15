<nav class="navbar fixed-top navbar-expand-lg navbar-light bg-white">
        <div class="container">
            <a class="navbar-brand" href="<?= createLink("/") ?>">Enjoy.</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
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
                    <li class="nav-item">
                        <a class="nav-link" href="<?= createLink("choose") ?>">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>