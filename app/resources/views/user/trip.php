<!-- header -->
<?php
require_once dirname(__DIR__) . "./components/header.php";
?>

<!-- css -->
<link rel="stylesheet" href="../css/trip.css">

<!-- travels list -->
<section>
    <div class="container">
        <!-- search bar -->
        <div class="row">
            <div class="text-end" style="margin-top: 90px;">
                    <form action="" method="post">
                        <input type="text" placeholder="type your destination">
                        <button type="submit">search</button>
                    </form>
            </div>
        </div>
        <?php if (isset($trips)) : ?>
        <div class="row justify-content-around gap-3 my-5">
            <?php foreach ($trips as $trip) : ?>
            <div class="col-lg-3 col-md-12 bg-white p-0 packages-box">
                <div>
                    <img src="../images/marrakech.jpg" class="w-100">
                    <div class="p-3">
                        <h5 class="mt-3"><?= $trip['destination'] ?></h5>
                        <p><?= $trip['description'] ?></p>
                        <p><?= $trip['end'] ?></p>
                        <a href="<?= createLink('user/addBooking/' . $trip['id'] )?>" class="btn btn-main">Book now</a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
    </div>
</section>

<a href="<?= createLink('user/history')?>">show history</a>

<!-- footer -->
<?php
require_once dirname(__DIR__) . "./components/footer.php";
?>