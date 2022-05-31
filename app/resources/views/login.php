<!-- header -->
<?php
require_once dirname(__DIR__) . "/views/components/header.php";
?>

<link rel="stylesheet" href="./css/login.css">

<!-- login page -->
<section class="login-form d-flex align-items-center" style="background-image: url(./images/solo-traveler.png);">
    <!-- <div class="overlay"></div> -->
    <div class="container text-dark login">
        <div class="row p-4">
            <div class="col-lg-5 col-md-6 col-sm-8 col-12 p-5 gap-3 d-flex flex-column bg-white" style="border-radius: 20px;">
                <h1 class="text-center">Login</h1>
                <p>Sign in to your account to continue.</p>
                <div>
                    <form class="row g-2">
                        <div class="form-group col-12">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Email ...">
                        </div>
                        <div class="form-group col-12">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Password ...">
                        </div>
                        <div class="text-center">
                            <button class="btn btn-main" type="submit">Login</button>
                        </div>
                    </form>
                </div>
                <p>
                    Don't have an account?
                    <a href="<?= createLink("/register") ?>" style="color: inherit!important;" class="text-reset">Register here</a>
                </p>
            </div>
        </div>
    </div>
</section>

<!-- footer -->
<?php
require_once dirname(__DIR__) . "/views/components/footer.php";
?>