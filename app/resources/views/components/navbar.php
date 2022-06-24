<nav class="navbar fixed-top navbar-expand-lg" style="background: #081f3e;">
    <div class="container text-white">
        <a class="navbar-brand text-white" href="<?= createLink("/") ?>"><span style="color: #077bd4;">Enjoy</span>Travel</a>
        <button class="navbar-toggler text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"><i class="fas fa-bars"></i></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <?php if (isLoggedIn()) { ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?= createLink("/home") ?>">Home</a>
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
                <li class="navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle second-text fw-bold" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                user
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="<?= createLink("user/showProfile/" . currentId()) ?>">Profile</a></li>
                                <li><a class="dropdown-item" href="<?= createLink("logout") ?>">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <?php }else{ ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= createLink("choose") ?>">Login</a>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</nav>