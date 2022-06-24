<!-- header -->
<?php
require_once dirname(__DIR__) . "./components/admin/sidebar.php";
?>

<!-- css style -->
<link rel="stylesheet" href="./../css/style.css">

<section style="margin-top: 100px;">
  <div class="container">
    <div class="row">
      <div class="col-xl-8">
        <!-- Account details card-->
        <div class="card shadow mb-4">
          <div class="card-header p-3">
            <h4>Account Details</h4>
          </div>
          <div class="card-body">
            <form method="POST">
              <!-- Form Row-->
              <div class="row gx-3 mb-3">
                <!-- Form Group (first name)-->
                <div class="col-md-6">
                  <label class="small mb-1">First name</label>
                  <input class="form-control" type="text" name="f_name" placeholder="Enter your first name" value="<?= $user['f_name'] ?>">
                </div>
                <!-- Form Group (last name)-->
                <div class="col-md-6">
                  <label class="small mb-1">Last name</label>
                  <input class="form-control" type="text" name="l_name" placeholder="Enter your last name" value="<?= $user['l_name'] ?>">
                </div>
              </div>
              <!-- Form Group (username)-->
              <div class="mb-3">
                <label class="small mb-1">Username</label>
                <input class="form-control" type="text" name="username" value="<?= $user['username'] ?>">
              <!-- Form Group (email address)-->
              <div class="mb-3">
                <label class="small mb-1">Email address</label>
                <input class="form-control" type="email" placeholder="Enter your email address" value="<?= $user['email'] ?>">
              </div>
              <!-- Form Row-->
              <div class="row gx-3 mb-3">
                <!-- Form Group (phone number)-->
                <div class="col-md-6">
                  <label class="small mb-1">Phone number</label>
                  <input class="form-control" type="tel" placeholder="Enter your phone number" value="<?= $user['phone'] ?>">
                </div>
                <!-- Form Group (birthday)-->
                <div class="col-md-6">
                  <label class="small mb-1">Birthday</label>
                  <input class="form-control" type="text" name="b_day" placeholder="Enter your birthday" value="<?= $user['b_day'] ?>">
                </div>
              </div>
              <div class="row gx-3 mb-3">
                <!-- Form Group (birthday)-->
                <div class="col-md-12">
                  <label class="small mb-1">Image</label>
                  <input class="form-control" type="file" name="image" placeholder="Enter your birthday" value="<?= $user['image'] ?>">
                </div>
              </div>
              <!-- Save changes button-->
              <button class="btn btn-main" type="submit">Save changes</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- footer -->
<?php
require_once dirname(__DIR__) . "./components/admin/footer.php";
?>