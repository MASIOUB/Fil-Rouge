<?php
require_once dirname(__DIR__) . "/views/components/header.php";
?>

<link rel="stylesheet" href="./css/login.css">

<!-- login page -->
<section class="bg-section d-flex align-items-center mt-5" style="background-image: url(./images/solo-traveler.png);">
    <!-- <div class="overlay"></div> -->
    <div class="container text-dark login">
        <div class="row plg-4 justify-content-center my-5">
            <div class="col-sm-10 col-12 p-5 gap-3 d-flex flex-column bg-white" style="border-radius: 20px;">
                <h1 class="text-center">Choose Type Of Your Account</h1>
                <div class="d-flex flex-column flex-lg-row gap-3">
                    <div class="p-5 text-center text-black" style="border-radius: 10px; border: 1px solid #077bd4"">
                        <h3>For Agencies</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita et, recusandae nobis fugit modi quibusdam ea assumenda.</p>
                        <a href="<?= createLink("agency/register") ?>" class="btn btn-main">Sign Up</a>
                    </div>
                    <div class="p-5 text-center text-black" style="border-radius: 10px; border: 1px solid #077bd4">
                        <h3>For Travelers</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita et, recusandae nobis fugit modi quibusdam ea assumenda.</p>
                        <a href="<?= createLink("register") ?>" class="btn btn-main">Sign Up</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- footer -->
<?php
require_once dirname(__DIR__) . "/views/components/footer.php";
?>