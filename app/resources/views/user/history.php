<!-- header -->
<?php
require_once dirname(__DIR__) . "./components/header.php";
?>

<div class="container py-5">
        <h1 class="text-center mb-5">Your Bookings</h1>
        <div class=" table-responsive">
            <table class="table border border-dark">
                <thead>
                    <tr>
                        <th>departure</th>
                        <th>destination</th>
                        <th>start</th>
                        <th>end</th>
                        <th>time</th>
                        <th>seats</th>
                        <th>price</th>
                    </tr>
                </thead>
                <?php if (isset($bookings)) : ?>
                <tbody>
                    <?php
                    foreach ($bookings as $booking) { ?>
                        <tr>
                            <td> <?= $booking['departure'] ?> </td>
                            <td> <?= $booking['destination'] ?> </td>
                            <td> <?= $booking['start'] ?> </td>
                            <td> <?= $booking['end'] ?> </td>
                            <td> <?= $booking['time'] ?> </td>
                            <td> <?= $booking['seats'] ?> </td>
                            <td> <?= $booking['price'] ?> </td>
                            <?php
                            $date = $booking["start"];
                            $time = $booking["time"];
                            $status = $booking["status"];
                            $datetime = ("$date $time");
                            if ($datetime > date("Y-m-d H:i:s", strtotime("+1 hour")) && $status != CANCELD) :
                            ?>
                                <td>
                                    <button class='btn' style="background-color: #dc3545; border-color: #dc3545;">
                                        <a href='<?= createLink("user/cancelBooking/" . $booking["id"]) ?>' class="text-dark" style="text-decoration: none;">
                                            <span>cancel</span>
                                        </a>
                                    </button>
                                <td>
                                <?php
                            endif;
                                ?>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>

            </table>
        </div>

    </div>
<?php endif; ?>

<?php if (isset($msg)){
    echo $msg;
} ?>

<!-- footer -->
<?php
require_once dirname(__DIR__) . "./components/footer.php";
?>