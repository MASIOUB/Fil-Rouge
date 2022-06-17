<!-- header -->
<?php
require_once dirname(__DIR__) . "./components/header.php";
?>

<!-- booking form -->
<!-- Full name
Email
Phone
Address
Where to:
How many:
arrivals(date depart)
leaving(date arrive)
 -->

<!-- <h1> Book Your Trip</h1> -->
<div class="row min-vh-100 align-content-center justify-content-center" sty>
    <div class="shadow rounded-3 card align-items-center w-50 p-0 my-5">
        <div class="card-header text-center w-100" style="background-color: #428DFC">
            <h2 class=" text-white">Make Your Booking</h2>
        </div>
        <div class="card-body w-100">
            <form class="d-flex flex-column" method="POST">
                <div class="mb-3">
                    <label class="form-label">From:</label>
                    <input type="text" class=" form-control" value="<?= $trip["departure"] ?>" readonly>
                </div>
                <div class="mb-3">
                    <label class="form-label">To:</label>
                    <input type="text" class=" form-control" value="<?= $trip["destination"] ?>" readonly>
                </div>
                <div class="mb-3">
                    <label class="form-label">Start:</label>
                    <input type="date" class=" form-control" value="<?= $trip["start"] ?>" readonly>
                </div>
                <div class="mb-3">
                    <label class="form-label">End:</label>
                    <input type="date" class=" form-control" value="<?= $trip["end"] ?>" readonly>
                </div>
                <div class="mb-3">
                    <label class="form-label">At:</label>
                    <input type="time" class=" form-control" value="<?= $trip["time"] ?>" readonly>
                </div>
                <div class="mb-3">
                    <label class="form-label">price:</label>
                    <input type="number" class=" form-control" value="<?= $trip["price"] ?>" readonly>
                </div>
                <div class="mb-3">
                    <div class="mb-3">
                        <label class="form-label">How many:</label>
                        <input type="number" class="form-control" value="1" min="1" name="seats">
                    </div>
                    <div class="mb-3 d-flex justify-content-center">
                        <button type="submit" class="btn text-light" style="background-color: #428DFC">Book</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- footer -->
<?php
require_once dirname(__DIR__) . "./components/footer.php";
?>