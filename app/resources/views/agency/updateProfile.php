<!-- header -->
<?php
require_once dirname(__DIR__) . "./components/agency/sidebar.php";
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
                            <!-- Form Group (username)-->
                            <div class="mb-3">
                                <!-- Form Group (name)-->
                                <div class="mb-3">
                                    <label class="small mb-1">Name</label>
                                    <input class="form-control" type="text" placeholder="Enter your email address" value="<?= $user['name'] ?>">
                                </div>
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
                                        <input class="form-control" type="text" placeholder="Enter your phone number" value="<?= $user['phone'] ?>">
                                    </div>
                                    <!-- Form Group (image)-->
                                    <div class="col-md-6">
                                        <label class="small mb-1">Image</label>
                                        <input class="form-control" type="file" name="image" placeholder="Enter your birthday" value="<?= $user['image'] ?>">
                                    </div>

                                </div>
                                <div class="row gx-3 mb-3">
                                    <!-- Form Group (address)-->
                                    <div class="col-12">
                                        <label class="small mb-1">Address</label>
                                        <input class="form-control" type="text" name="address" placeholder="Enter your birthday" value="<?= $user['address'] ?>">
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
require_once dirname(__DIR__) . "./components/agency/footer.php";
?>