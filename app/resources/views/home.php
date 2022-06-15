<?php
require_once dirname(__DIR__) . "/views/components/header.php";
?>

<link rel="stylesheet" href="./css/test.css">
<link rel="stylesheet" href="./css/trip.css">

<!-- hero -->
<section class="bg-cover hero-section d-flex justify-content-center align-items-center" style="background-image: url(./images/home-slide-1.jpg);">
    <!-- <div class="overlay"></div> -->
    <div class="container text-center">
        <div class="row">
            <div class="col-12">
                <span style="font-size: 1rem; color: #fff9;" class="pb-3">explore, discover, travel</span>
                <h3 style="font-size: 6vw; text-shadow:0 1.5rem 3rem rgba(0,0,0,.3);" class="py-3 text-white">TRAVEL ARROUND THE WORLD</h3>
                <a href="#" class="btn btn-main">discover more</a>
            </div>
        </div>
    </div>
</section>

<!-- services -->
<!-- <section class="text-center">
    <div class="container">
        <div class="row">
            <div class="col-12 section-intro text-center">
                <h1>Our services</h1>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-4 mb-3">
                <div class="p-3" style="border: 5px solid #f1f1f1;">
                    <div>
                        <i class="fas fa-headphones" style="color: #006cff; font-size: 50px;"></i>
                    </div>
                    <div>
                        <h5 class="mt-4">Service Name</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse vitae.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="p-3" style="border: 5px solid #f1f1f1;">
                    <div>
                        <i class="fas fa-award" style="color: #006cff; font-size: 50px;"></i>
                    </div>
                    <div>
                        <h5 class="mt-4">Service Name</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse vitae.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="p-3" style="border: 5px solid #f1f1f1;">
                    <div>
                        <i class="fas fa-wallet" style="color: #006cff; font-size: 50px;"></i>
                    </div>
                    <div>
                        <h5 class="mt-4">Service Name</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse vitae.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> -->

<!-- about -->
<section>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-12 px-0">
                <img src="./images/arche.jpg" class="w-100">
            </div>
            <div class="col-lg-6 col-md-12 py-3" style="background: #f1f1f1;">
                <div class="row">
                    <div class="col-12 section-intro text-center">
                        <h1>About Us</h1>
                    </div>
                </div>
                <!-- <h1>about us</h1> -->
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita et, recusandae nobis fugit modi quibusdam ea assumenda, nulla quisquam repellat rem aliquid sequi maxime sapiente autem ipsum? Nobis, provident voluptate?</p>
                <a href="#" class="btn btn-main">read more</a>
            </div>
        </div>
    </div>
</section>

<!-- new travel -->
<section style="background: #f1f1f1;">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center" style="margin-bottom: 40px;">
                <h1>The latest packages</h1>
            </div>
        </div>
        <div class="row justify-content-around gap-3">
            <div class="col-lg-3 col-md-12 bg-white p-0 packages-box">
                <div>
                    <img src="./images/marrakech.jpg" class="w-100">
                    <div class="p-3">
                        <h5 class="mt-3">Marrakech, Maroc</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        <a href="#" class="btn btn-main">read more</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-12 bg-white p-0 packages-box">
                <div>
                    <img src="./images/marrakech.jpg" class="w-100">
                    <div class="p-3">
                        <h5 class="mt-3">Marrakech, Maroc</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        <a href="#" class="btn btn-main">read more</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-12 bg-white p-0 packages-box">
                <div>
                    <img src="./images/marrakech.jpg" class="w-100">
                    <div class="p-3">
                        <h5 class="mt-3">Marrakech, Maroc</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        <a href="#" class="btn btn-main">read more</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- contact -->
<section class="bg-cover hero-section" style="background-image: url(./images/contact.webp);">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center text-black mb-5">
                <h1 class="display-4">Get in touch</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 mx-auto">
                <form class="row g-4">
                    <div class="form-group col-md-6">
                        <input type="text" class="form-control" placeholder="Full name">
                    </div>
                    <div class="form-group col-md-6">
                        <input type="email" class="form-control" placeholder="Email address">
                    </div>
                    <div class="form-group col-md-12">
                        <input type="text" class="form-control" placeholder="Subject">
                    </div>
                    <div class="form-group col-md-12">
                        <textarea cols="30" rows="4" class="form-control" placeholder="Message"></textarea>
                    </div>
                    <div class="text-center">
                        <button class="btn btn-main" type="submit">Send Message</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- footer -->
<?php
require_once dirname(__DIR__) . "/views/components/footer.php";
?>