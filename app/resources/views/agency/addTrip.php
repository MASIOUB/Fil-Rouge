<!-- header -->
<?php
require_once dirname(__DIR__) . "./components/agency/sidebar.php";
?>

<!-- login page -->
<!-- <section class="login-form d-flex align-items-center" style="background-image: url(./images/solo-traveler.png);"> -->
<!-- <div class="overlay"></div> -->
<!-- <div class="container text-dark login">
        <div class="row p-4">
            <div class="col-lg-6 col-md-7 col-sm-10 col-12 p-5 gap-3 d-flex flex-column bg-white" style="border-radius: 20px;"> -->
<?php
// the message
// $msg = "First line of text\nSecond line of text";

// use wordwrap() if lines are longer than 70 characters
// $msg = wordwrap($msg, 70);

// send email
// mail("zmasioub@gmail.com", "My subject", "hello world!");
?>
<h1 class="text-center">Add Trip</h1>
<!-- <div>
                    <form class="row gap-2" method="POST" enctype="multipart/form-data">
                        <div class="form-group col-12">
                            <label class="form-label">Departure</label>
                            <input type="file" name="image" class="form-control" placeholder="Name ...">
                        </div>
                        <div class="form-group col-12">
                            <label class="form-label">Departure</label>
                            <input type="text" name="departure" class="form-control" placeholder="Name ...">
                        </div>
                        <div class="form-group col-12">
                            <label class="form-label">Destination</label>
                            <input type="text" name="destination" class="form-control" placeholder="Address ...">
                        </div>
                        <div class="form-group col-12">
                            <label class="form-label">De</label>
                            <input type="date" name="start" class="form-control" placeholder="Phone ...">
                        </div>
                        <div class="form-group col-12">
                            <label class="form-label">à</label>
                            <input type="date" name="end" class="form-control" placeholder="Email ...">
                        </div>
                        <div class="form-group col-12">
                            <label class="form-label">Time</label>
                            <input type="time" name="time" class="form-control" placeholder="Password ...">
                        </div>
                        <div class="form-group col-12">
                            <label class="form-label">Description</label>
                            <input type="text" name="description" class="form-control" placeholder="Confirm Password ...">
                        </div>
                        <div class="form-group col-12">
                            <label class="form-label">Price</label>
                            <input type="text" name="price" class="form-control" placeholder="Confirm Password ...">
                        </div>
                        <div class="form-group col-12">
                            <label class="form-label">Number of seats</label>
                            <input type="number" name="seats" class="form-control" placeholder="Confirm Password ...">
                        </div>
                        <div class="text-center">
                            <button class="btn btn-main" type="submit">Register</button>
                        </div>
                    </form>
                </div> -->
<!-- </div>
        </div>
    </div>
</section> -->
<!-- login page -->
<section class="d-flex align-items-center">
    <div class="container text-dark login">
        <div class="row p-4">
            <div class="col-lg-12 p-5 gap-3 d-flex flex-column bg-white shadow" style="border-radius: 20px;">
                <div>
                    <form class="row g-2" method="POST" enctype="multipart/form-data">
                        <div class="form-group col-12 col-sm-12 col-lg-6">
                            <label class="form-label text-red">From </label>
                            <input type="text" name="departure" class="form-control" placeholder="Departure ...">
                        </div>
                        <div class="form-group col-12 col-sm-12 col-lg-6">
                            <label class="form-label">To</label>
                            <input type="text" name="destination" class="form-control" placeholder="Destination ...">
                        </div>
                        <div class="form-group col-12 col-sm-12 col-lg-6">
                            <label class="form-label">Check In</label>
                            <input type="date" name="start" min="<?= date('Y-m-d')?>" class="form-control" placeholder="Date Of Departure ...">
                        </div>
                        <div class="form-group col-12 col-sm-12 col-lg-6">
                            <label class="form-label">Check Out</label>
                            <input type="date" name="end" class="form-control" placeholder="Return Date ...">
                        </div>
                        <div class="form-group col-12 col-sm-12 col-lg-6">
                            <label class="form-label">At</label>
                            <input type="time" name="time" class="form-control" placeholder="Time ...">
                        </div>
                        <div class="form-group col-12 col-sm-12 col-lg-6">
                            <label class="form-label">Number Of Seats</label>
                            <input type="number" name="seats" class="form-control" placeholder="Number Of Seats ...">
                        </div>
                        <div class="form-group col-12 col-sm-12 col-lg-6">
                            <label class="form-label">Price</label>
                            <input type="number" name="price" class="form-control" placeholder="Price ...">
                        </div>
                        <div class="form-group col-12 col-sm-12 col-lg-6">
                            <label class="form-label">Image</label>
                            <input type="file" name="image" class="form-control">
                        </div>
                        <div class="form-group col-12">
                            <label class="form-label">Description</label>
                            <textarea name="description" cols="30" rows="10" class="form-control"></textarea>
                        </div>
                        <div class="text-center">
                            <button class="btn btn-main" type="submit">Add Trip</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
require_once dirname(__DIR__) . "./components/agency/footer.php";
?>