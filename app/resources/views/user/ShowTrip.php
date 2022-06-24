<!-- header -->
<?php
require_once dirname(__DIR__) . "./components/header.php";
?>

<style>
    @media (max-width: 768px)
    {
        .exif_imagetype{
            width: 100vw;
        }
    }
</style>

<!-- agencies profile -->
<section class="mb-5" style="margin-top: 100px;">
    <div class="container">
        <div class="row">
            <!-- <div class="col-xl-4"> -->
            <!-- Profile picture card-->
            <!-- <div class="card shadow mb-4 mb-xl-0">
          <div class="card-header p-3">
            <h4>Profile Picture</h4>
          </div>
          <div class="card-body d-flex flex-column align-items-center text-center"> -->
            <!-- Profile picture image-->
            <!-- <img class="rounded-circle mb-2" style="height: 10rem; width: 10rem; border-radius: 50% !important;" src="http://bootdey.com/img/Content/avatar/avatar1.png" alt=""> -->
            <!-- Profile picture upload button-->
            <!-- <button class="btn btn-main" type="button">Upload new image</button>
          </div>
        </div>
      </div> -->
            <div class="col-xl-12">


                <!-- Account details card-->
                <!-- <div class="card shadow mb-4 col-xl-4">
         
        </div> -->
                <div class="card shadow mb-4 col-xl-12">
                    <div class="card-body d-flex align-items-start gap-3 pb-0">
                        <!-- Profile picture image-->
                        <div>
                            <img class=" mb-2 image" style="height: 40vw; width: 40vw;" src="./../../uploads/<?= $trip['image'] ?>" alt="">
                        </div>
                        <div class="w-100">
                            <div>
                                <p>Created By: <a class="text-black text-opacity-50" href="<?= createLink('user/showAgency/' . $trip['id_agency']) ?>" class="text-black"><?= $trip['name'] ?></a></p>
                            </div>
                            <div class="d-flex justify-content-between">
                                <h1><?= $trip['destination'] ?></h1>
                                <h1><?= $trip['price'] ?> Dhs</h1>
                            </div>
                            <div>
                                <p>From: <?= $trip['departure'] ?></p>
                            </div>
                            <div>
                                <p>Check In: <?= $trip['start'] ?></p>
                            </div>
                            <div>
                                <p>Check Out: <?= $trip['end'] ?></p>
                            </div>
                            <div>
                                <h4>Description:</h4>
                                <p> <?= $trip['description'] ?></p>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="card-body">
            <h4>Comments</h4>
            <div>
              <div class="card-body">
                <div class="d-flex flex-start align-items-center">
                  <img class="rounded-circle shadow-1-strong me-3" src="./../../uploads/<?= $comment['image'] ?>" alt="avatar" width="60" height="60" />
                  <div>
                    <h6 class="fw-bold mb-1"></?= $comment['username'] ?></h6>
                    <p class="text-muted small mb-0">
                    </?= $comment['created_at'] ?>
                    </p>
                  </div>
                </div>

                <p class="mt-3 mb-4 pb-2">
                  </?= $comment['content'] ?>
                </p>
              </div>
        </div>-->
                </div>
            </div>
        </div>
</section>

<!-- footer -->
<?php
require_once dirname(__DIR__) . "./components/footer.php";
?>