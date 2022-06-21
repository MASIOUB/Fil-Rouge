<!-- header -->
<?php
require_once dirname(__DIR__) . "./components/admin/sidebar.php";
?>

<div class="container-fluid px-4">
<div class="row my-5">
        <h3 class="fs-4 mb-3">Recent Orders</h3>
        <div class="col">
            <table class="table bg-white rounded shadow-sm  table-hover">
                <thead>
                    <tr>
                        <th scope="col" width="50">#</th>
                        <th scope="col">Destination</th>
                        <th scope="col">Date</th>
                        <th scope="col">Seats</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($bookings as $booking) {?>
                    <tr>
                        <th scope="row"><?= $booking['id'] ?></th>
                        <td><?= $booking['destination'] ?></td>
                        <td><?= $booking['start'] ?></td>
                        <td><?= $booking['seats'] ?></td>
                    </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
    </div>
    </div>

<?php
require_once dirname(__DIR__) . "./components/admin/footer.php";
?>