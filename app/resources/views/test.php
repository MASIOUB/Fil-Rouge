<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Bootstrap Example</title>
    <link rel="stylesheet" href="./css/test.css">
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>

    <div id="hero-slide" class="carousel carousel-dark slide align-items-center" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#hero-slide" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#hero-slide" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#hero-slide" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active slide-one" data-bs-interval="10000" style="background-image: url(./images/home-slide-1.jpg);">
                <!-- <img src="./images/home-slide-2.jpg" class="d-block w-100" alt="..."> -->
                <div class="carousel-caption d-none d-md-block">
                    <!-- <div class="container text-white"> -->
                    <!-- <div class="row"> -->
                    <!-- <div class="col-12"> -->
                    <span style="font-size: 1rem; color: #fff9;" class="pb-3">explore, discover, travel</span>
                    <h3 style="font-size: 6vw; text-shadow:0 1.5rem 3rem rgba(0,0,0,.3);" class="py-3 text-white">TRAVEL ARROUND THE WORLD</h3>
                    <a href="#" class="btn btn-main">discover more</a>
                    <!-- <a href="#" class="btn btn-main">Get started</a> -->
                    <!-- </div> -->
                    <!-- </div> -->
                    <!-- </div> -->
                    <!-- <h5>First slide label</h5>
                    <p>Some representative placeholder content for the first slide.</p> -->
                </div>
            </div>
            <div class="carousel-item slide-two" data-bs-interval="2000" style="background-image: url(./images/home-slide-2.jpg);">
                <!-- <img src="./images/home-slide-2.jpg" class="d-block w-100" alt="..."> -->
                <div class="carousel-caption d-none d-md-block">
                    <span style="font-size: 1rem; color: #fff9;" class="pb-3">explore, discover, travel</span>
                    <h3 style="font-size: 6vw; text-shadow:0 1.5rem 3rem rgba(0,0,0,.3);" class="py-3 text-white">TRAVEL ARROUND THE WORLD</h3>
                    <a href="#" class="btn btn-main">discover more</a>
                </div>
            </div>
            <div class="carousel-item slide-three" style="background-image: url(./images/home-hero.jpg);">
                <!-- <img src="./images/home-slide-2.jpg" class="d-block w-100" alt="..."> -->
                <div class="carousel-caption d-none d-md-block">
                    <span style="font-size: 1rem; color: #fff9;" class="pb-3">explore, discover, travel</span>
                    <h3 style="font-size: 6vw; text-shadow:0 1.5rem 3rem rgba(0,0,0,.3);" class="py-3 text-white">TRAVEL ARROUND THE WORLD</h3>
                    <a href="#" class="btn btn-main">discover more</a>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#hero-slide" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#hero-slide" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>