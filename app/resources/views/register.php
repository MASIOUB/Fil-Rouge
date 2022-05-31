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
            <div class="col-lg-6 col-md-7 col-sm-10 col-12 p-5 gap-3 d-flex flex-column bg-white" style="border-radius: 20px;">
                <h1 class="text-center">Register</h1>
                <div>
                    <form class="row gap-2">
                        <div class="form-group col-12">
                            <label class="form-label">Full Name </label>
                            <input type="text" name="name" class="form-control" placeholder="Full Name ...">
                        </div>
                        <div class="form-group col-12">
                            <label class="form-label">Phone</label>
                            <input type="text" name="phone" class="form-control" placeholder="Phone ...">
                        </div>
                        <div class="form-group col-12">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Email ...">
                        </div>
                        <div class="form-group col-12">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Password ...">
                        </div>
                        <div class="form-group col-12">
                            <label class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" placeholder="Confirm Password ...">
                        </div>
                        <div class="text-center">
                            <button class="btn btn-main" type="submit">Register</button>
                        </div>
                    </form>
                </div>
                <p>
                    Are you already member?
                    <a href="<?= createLink("/login") ?>" style="color: inherit!important;" class="text-reset">Login here</a>
                </p>
            </div>
        </div>
    </div>
</section>

<!-- footer -->
<?php
require_once dirname(__DIR__) . "/views/components/footer.php";
?>