<!-- header -->
<?php
require_once dirname(__DIR__) . "./components/agency/sidebar.php";
?>

<h1 class="text-center">Add Trip</h1>

<!-- login page -->
<section class="d-flex align-items-center">
    <div class="container text-dark login">
        <div class="row p-4">
            <div class="col-lg-12 p-5 gap-3 d-flex flex-column bg-white shadow" style="border-radius: 20px;">
                <div>
                    <form class="row g-2" method="POST" enctype="multipart/form-data">
                        <div class="form-group col-12 col-sm-12 col-lg-6">
                            <label class="form-label text-red">From </label>
                            <input type="text" name="departure" value="<?= $trip['departure']?>" class="form-control" placeholder="Departure ...">
                        </div>
                        <div class="form-group col-12 col-sm-12 col-lg-6">
                            <label class="form-label">To</label>
                            <input type="text" name="destination" value="<?= $trip['destination']?>" class="form-control" placeholder="Destination ...">
                        </div>
                        <div class="form-group col-12 col-sm-12 col-lg-6">
                            <label class="form-label">Check In</label>
                            <input type="date" name="start" value="<?= $trip['start']?>" class="form-control" placeholder="Date Of Departure ...">
                        </div>
                        <div class="form-group col-12 col-sm-12 col-lg-6">
                            <label class="form-label">Check Out</label>
                            <input type="date" name="end" value="<?= $trip['end']?>" class="form-control" placeholder="Return Date ...">
                        </div>
                        <div class="form-group col-12 col-sm-12 col-lg-6">
                            <label class="form-label">At</label>
                            <input type="time" name="time" value="<?= $trip['time']?>" class="form-control" placeholder="Time ...">
                        </div>
                        <div class="form-group col-12 col-sm-12 col-lg-6">
                            <label class="form-label">Number Of Seats</label>
                            <input type="number" name="seats" value="<?= $trip['seats']?>" class="form-control" placeholder="Number Of Seats ...">
                        </div>
                        <div class="form-group col-12 col-sm-12 col-lg-6">
                            <label class="form-label">Price</label>
                            <input type="number" name="price" value="<?= $trip['price']?>" class="form-control" placeholder="Price ...">
                        </div>
                        <div class="form-group col-12 col-sm-12 col-lg-6">
                            <label class="form-label">Image</label>
                            <input type="file" name="image" value="<?= $trip['image']?>" class="form-control">
                        </div>
                        <div class="text-center">
                            <button class="btn btn-main" type="submit">Update</button>
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