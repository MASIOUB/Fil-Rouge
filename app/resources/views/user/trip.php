<!-- header -->
<?php
require_once dirname(__DIR__) . "./components/header.php";
?>

<!-- css -->
<link rel="stylesheet" href="../css/trip.css">

<!-- travels list -->
<section>
    <div class="container">

        <div class="row">
            <h1 class="d-flex justify-content-center align-items-end" style="height: 25vh">Search for your next packages</h1>
        </div>
        <!-- search bar -->
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-lg-6 mt-5 border p-3">
                <form class="input-group" method="post">
                    <input type="text" name="departure" class="form-control" value="<?= $_POST["departure"] ?? "" ?>" placeholder="Departure ..." />
                    <input type="date" name="start" class="form-control" value="<?= $_POST["start"] ?? "" ?>" placeholder="Check in ..." />
                    <button type="submit" class="btn" style="background-color: #081f3e;">
                        <i class="fas fa-search text-white"></i>
                    </button>
                </form>
            </div>
        </div>
        <?php if (isset($trips)) : ?>
            <div class="row my-5">
                <?php foreach ($trips as $trip) : ?>
                    <div class="col-xl-4 col-md-6 mb-4">
                        <div class="card border-0 shadow" style="border-radius: 25px;">
                            <img src="./../uploads/<?= $trip['image'] ?>" class="card-img-top" alt="..." style="border-top-left-radius: 25px; border-top-right-radius: 25px; height: 300px">
                            <div class="card-body text-center">
                                <div class="d-flex justify-content-between">
                                    <h5 class="mt-3"><?= $trip['destination'] ?></h5>
                                    <h5 class="mt-3"><?= $trip['price'] ?> DH</h5>
                                </div>
                                <!-- <h5 class="mt-3"></?= $trip['destination'] ?></h5> -->
                                <!-- <p></?= $trip['data'] ?>...</p> -->
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>

<a href="<?= createLink('user/history') ?>">show history</a>

<!-- footer -->
<?php
require_once dirname(__DIR__) . "./components/footer.php";
?>