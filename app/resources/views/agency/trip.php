<!-- header -->
<?php
require_once dirname(__DIR__) . "./components/agency/sidebar.php";
?>

<div class="container-fluid px-4">
    <div class="row my-5">
        <div class="d-flex justify-content-between">
            <h3 class="fs-4 mb-3">Recent Orders</h3>
            <a href="<?= createLink("agency/addTrip") ?>"><i class="fas fa-plus"></i></a>
        </div>
        <div class="col">
            <table class="table bg-white rounded shadow-sm  table-hover">
                <thead>
                    <tr>
                        <th scope="col" width="50">#</th>
                        <th scope="col">Destination</th>
                        <th scope="col">Date</th>
                        <th scope="col">Price</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($trips as $trip) { ?>
                        <tr>
                            <th scope="row"><?= $trip['id'] ?></th>
                            <td><?= $trip['destination'] ?></td>
                            <td><?= $trip['start'] ?></td>
                            <td><?= $trip['price'] ?></td>
                            <td class="d-flex justify-content-around">
                                <a href="#"><i class="fas fa-eye"></i></a>
                                <a href="<?= createLink("agency/updateTrip/" . $trip['id']) ?>"><i class="fas fa-edit"></i></a>
                                <a href="<?= createLink("agency/cancelTrip/" . $trip['id']) ?>"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php
require_once dirname(__DIR__) . "./components/agency/footer.php";
?>