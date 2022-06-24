<!-- header -->
<?php
require_once dirname(__DIR__) . "./components/header.php";
?>

<!-- css style -->
<link rel="stylesheet" href="./../css/style.css">



<!-- profile -->
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