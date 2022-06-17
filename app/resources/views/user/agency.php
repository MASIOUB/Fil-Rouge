<!-- header -->
<?php
require_once dirname(__DIR__) . "./components/header.php";
?>

<!-- agencies list -->
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
        <?php if (isset($agencies)) : ?>
        <div class="row justify-content-around gap-3 my-5">
            <?php foreach ($agencies as $agency) : ?>
            <div class="col-lg-3 col-md-12 bg-white p-0 packages-box">
                <div>
                    <img src="../images/marrakech.jpg" class="w-100">
                    <div class="p-3">
                        <h5 class="mt-3"><?= $agency['name'] ?></h5>
                        <p><?= $agency['email'] ?></p>
                        <p><?= $agency['phone'] ?></p>
                        <!-- <a href="</?= createLink('user/addBooking/' . $agency['id'] )?>" class="btn btn-main">Book now</a> -->
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
    </div>
</section>

<!-- footer -->
<?php
require_once dirname(__DIR__) . "./components/footer.php";
?>