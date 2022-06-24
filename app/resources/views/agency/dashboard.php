<!-- header -->
<?php
require_once dirname(__DIR__) . "./components/agency/sidebar.php";
?>

<!-- I'am home for agency!!!! <br> -->

<!-- </?= currentId() ?> <br> -->

<a href="<?= createLink("logout") ?>">logout</a><br>
<!-- <a href="</?= createLink("agency/addTrip") ?>">add</a><br>
<a href="</?= createLink("agency/test") ?>">test</a><br> -->

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
require_once dirname(__DIR__) . "./components/agency/footer.php";
?>