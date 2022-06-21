<!-- header -->
<?php
require_once dirname(__DIR__) . "./components/admin/sidebar.php";
?>

<!-- <section style="background: #f1f1f1;">
    <div class="container">
        <div class="row">
            </?php foreach ($trips as $trip) : ?>
                <div class="col-xl-4 col-md-6 mb-4">
                    <div class="card border-0 shadow" style="border-radius: 25px;">
                        <img src="./uploads/</?= $trip['image'] ?>" class="card-img-top" alt="..." style="border-top-left-radius: 25px; border-top-right-radius: 25px; height: 300px">
                        <div class="card-body text-center">
                            <div class="d-flex justify-content-between">
                                <h5 class="mt-3"></?= $trip['destination'] ?></h5>
                                <h5 class="mt-3"></?= $trip['price'] ?> DH</h5>
                            </div>
                            <p></?= $trip['data'] ?>...</p>
                        </div>
                    </div>
                </div>
            </?php endforeach; ?>
        </div>
    </div>
</section> -->

<div class="container-fluid px-4">
    <div class="row">
        <h1>Dashbord</h1>
    </div>
    <div class="row g-3 my-2">
        <div class="col-sm-6">
            <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                <div>
                    <h3 class="fs-2"><?= $users?></h3>
                    <p class="fs-5">Customers</p>
                </div>
                <i class="fas fa-user fs-1 p-3" style="color: #077bd4;"></i>
            </div>
        </div>

        <div class="col-sm-6">
            <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                <div>
                    <h3 class="fs-2"><?= $agencies?></h3>
                    <p class="fs-5">Agencies</p>
                </div>
                <i class="fas fa-building fs-1 p-3" style="color: #077bd4;"></i>
            </div>
        </div>

        <div class="col-sm-6">
            <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                <div>
                    <h3 class="fs-2"><?= $trips?></h3>
                    <p class="fs-5">Packages</p>
                </div>
                <i class="fas fa-suitcase-rolling fs-1 p-3" style="color: #077bd4;"></i>
            </div>
        </div>

        <div class="col-sm-6">
            <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                <div>
                    <h3 class="fs-2"><?= $bookings?></h3>
                    <p class="fs-5">Bookings</p>
                </div>
                <i class="fas fa-check fs-1 p-3" style="color: #077bd4;"></i>
            </div>
        </div>
    </div>

    

</div>

<?php
require_once dirname(__DIR__) . "./components/admin/footer.php";
?>