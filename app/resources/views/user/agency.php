<!-- header -->
<?php
require_once dirname(__DIR__) . "./components/header.php";
?>

<!-- agencies list -->
<section>
    <div class="container">
        <div class="row">
            <h1 class="d-flex justify-content-center align-items-end" style="height: 25vh">Find more about agencies</h1>
        </div>
        <!-- search bar -->
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-lg-6 mt-5 border p-3">
                <form class="input-group" method="post">
                    <input type="text" name="name" class="form-control" value="<?= $_POST["name"] ?? "" ?>" placeholder="Name ..." />
                    <button type="submit" class="btn" style="background-color: #081f3e;">
                        <i class="fas fa-search text-white"></i>
                    </button>
                </form>
            </div>
        </div>
        <?php if (isset($agencies)) : ?>
            <div class="row my-5">
                <?php foreach ($agencies as $agency) : ?>
                    <div class="col-xl-4 col-md-6 mb-4">
                        <div class="card border-0 shadow" style="border-radius: 25px;">
                            <img src="../images/marrakech.jpg" class="card-img-top" alt="..." style="border-top-left-radius: 25px; border-top-right-radius: 25px; height: 300px">
                            <div class="card-body text-center">
                                <div class="d-flex justify-content-between">
                                    <h5 class="mt-3"><a href="<?= createLink('user/showAgency/' . $agency['id']) ?>" class="text-black"><?= $agency['name'] ?></a></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>

    <!-- <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-0 shadow" style="border-radius: 25px;">
            <img src="../images/marrakech.jpg" class="card-img-top" alt="..." style="border-top-left-radius: 25px; border-top-right-radius: 25px; height: 300px">
            <div class="card-body text-center">
                <div class="d-flex justify-content-between">
                    <h5 class="mt-3"></?= $agency['name'] ?></h5>
                </div>
            </div>
        </div>
    </div> -->
</section>

<!-- footer -->
<?php
require_once dirname(__DIR__) . "./components/footer.php";
?>