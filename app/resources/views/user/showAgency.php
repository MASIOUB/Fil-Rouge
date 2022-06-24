<!-- header -->
<?php
require_once dirname(__DIR__) . "./components/header.php";
?>

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
          <div class="card-body d-flex align-items-center gap-3 pb-0">
            <!-- Profile picture image-->
            <img class=" mb-2" style="height: 15rem; width: 15rem;" src="./../../uploads/<?= $agency['image'] ?>" alt="">
            <div>
              <div>
                <h1><?= $agency['name'] ?></h1>
              </div>
              <div>
                <p><?= $agency['email'] ?></p>
              </div>
              <div>
                <p><?= $agency['phone'] ?></p>
              </div>
              <div>
                <p><?= $agency['address'] ?></p>
              </div>

            </div>
          </div>
          <div class="card-body">
            <h4>Comments</h4>
            <div>
              <?php foreach ($comments as $comment) { ?>
              <div class="card-body">
                <div class="d-flex flex-start align-items-center">
                  <img class="rounded-circle shadow-1-strong me-3" src="./../../uploads/<?= $comment['image'] ?>" alt="avatar" width="60" height="60" />
                  <div>
                    <h6 class="fw-bold mb-1"><?= $comment['username'] ?></h6>
                    <p class="text-muted small mb-0">
                    <?= $comment['created_at'] ?>
                    </p>
                  </div>
                </div>

                <p class="mt-3 mb-4 pb-2">
                  <?= $comment['content'] ?>
                </p>
              </div>
              <?php } ?>
              <form method="POST" class="card-footer py-3 border-0" style="background-color: #fff !important;">
                <div class="d-flex flex-start w-100">
                  <img class="rounded-circle shadow-1-strong me-3" src="./../../uploads/<?= $user['image'] ?>" alt="avatar" width="40" height="40" />
                  <div class="form-outline w-100">
                    <textarea class="form-control" name="content" id="textAreaExample" rows="4" style="background: #fff;" placeholder="Comment ..."></textarea>
                  </div>
                </div>
                <div class="float-end mt-2 pt-1">
                  <button type="submit" class="btn btn-main btn-sm">Post comment</button>
                </div>
              </form>
            </div>
            <!-- <div>
              <form method="POST" class="d-flex flex-column gap-3">
                <div>
                  <textarea name="content" cols="30" rows="5" class="form-control col-12"></textarea>
                </div>
                <div>
                  <button type="submit" class="btn btn-main text-center mx-auto">Send</button>
                </div>
              </form>
            </div> -->
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- footer -->
<?php
require_once dirname(__DIR__) . "./components/footer.php";
?>