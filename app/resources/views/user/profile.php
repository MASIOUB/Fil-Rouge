<!-- header -->
<?php
require_once dirname(__DIR__) . "./components/header.php";
?>

<!-- css style -->
<link rel="stylesheet" href="./../css/style.css">



<!-- profile -->
<!-- <section class="vh-100" style="background-color: #f4f5f7;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-lg-6 mb-4 mb-lg-0">
        <div class="card mb-3" style="border-radius: .5rem;">
          <div class="row g-0">
            <div class="col-md-4 gradient-custom text-center text-white bg-black"
              style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
              <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava1-bg.webp"
                alt="Avatar" class="img-fluid my-5" style="width: 80px;" />
              <h5></?= $user['name'] ?></h5>
              <p>Web Designer</p>
              <i class="far fa-edit mb-5"></i>
            </div>
            <div class="col-md-8">
              <div class="card-body p-4">
                <h6>Information</h6>
                <hr class="mt-0 mb-4">
                <div class="row pt-1">
                  <div class="col-6 mb-3">
                    <h6>Email</h6>
                    <p class="text-muted"></?= $user['email'] ?></p>
                  </div>
                  <div class="col-6 mb-3">
                    <h6>Phone</h6>
                    <p class="text-muted"></?= $user['phone'] ?></p>
                  </div>
                </div>
                <h6>Projects</h6>
                <hr class="mt-0 mb-4">
                <div class="row pt-1">
                  <div class="col-6 mb-3">
                    <h6>Recent</h6>
                    <p class="text-muted">Lorem ipsum</p>
                  </div>
                  <div class="col-6 mb-3">
                    <h6>Most Viewed</h6>
                    <p class="text-muted">Dolor sit amet</p>
                  </div>
                </div>
                <div class="d-flex justify-content-start">
                  <a href="#!"><i class="fab fa-facebook-f fa-lg me-3"></i></a>
                  <a href="#!"><i class="fab fa-twitter fa-lg me-3"></i></a>
                  <a href="#!"><i class="fab fa-instagram fa-lg"></i></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section> -->

<section style="margin-top: 100px;">
  <div class="container">
    <div class="row">
      <div class="col-xl-4">
        <!-- Profile picture card-->
        <div class="card shadow mb-4 mb-xl-0">
          <div class="card-header p-3">
            <h4>Profile Picture</h4>
          </div>
          <div class="card-body d-flex flex-column align-items-center text-center">
            <!-- Profile picture image-->
            <img class="rounded-circle mb-2" style="height: 10rem; width: 10rem; border-radius: 50% !important;" src="http://bootdey.com/img/Content/avatar/avatar1.png" alt="">
            <!-- Profile picture upload button-->
            <button class="btn btn-main" type="button">Upload new image</button>
          </div>
        </div>
      </div>
      <div class="col-xl-8">
        <!-- Account details card-->
        <div class="card shadow mb-4">
          <div class="card-header p-3">
            <h4>Account Details</h4>
          </div>
          <div class="card-body">
            <form>
              <!-- Form Row-->
              <div class="row gx-3 mb-3">
                <!-- Form Group (first name)-->
                <div class="col-md-6">
                  <label class="small mb-1">First name</label>
                  <input class="form-control" type="text" value="<?= $user['f_name'] ?>" readonly>
                </div>
                <!-- Form Group (last name)-->
                <div class="col-md-6">
                  <label class="small mb-1">Last name</label>
                  <input class="form-control" type="text" value="<?= $user['l_name'] ?>" readonly>
                </div>
              </div>
              <!-- Form Group (username)-->
              <div class="mb-3">
                <label class="small mb-1">Username</label>
                <input class="form-control" type="text" value="<?= $user['username'] ?>" readonly>
                <!-- Form Group (email address)-->
                <div class="mb-3">
                  <label class="small mb-1">Email address</label>
                  <input class="form-control" type="email" value="<?= $user['email'] ?>" readonly>
                </div>
                <!-- Form Row-->
                <div class="row gx-3 mb-3">
                  <!-- Form Group (phone number)-->
                  <div class="col-md-6">
                    <label class="small mb-1">Phone number</label>
                    <input class="form-control" type="tel" value="<?= $user['phone'] ?>" readonly>
                  </div>
                  <!-- Form Group (birthday)-->
                  <div class="col-md-6">
                    <label class="small mb-1">Birthday</label>
                    <input class="form-control" type="date" value="<?= $user['b_day'] ?>" readonly>
                  </div>
                </div>
                <!-- Update button-->
                <a href="<?= createLink("user/updateProfile/" . currentId()) ?>" class="btn btn-main">Update</a>
            </form>
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