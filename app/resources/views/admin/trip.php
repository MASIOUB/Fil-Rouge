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
                        <th scope="col">Price</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($trips as $trip) {?>
                    <tr>
                        <th scope="row"><?= $trip['id'] ?></th>
                        <td><?= $trip['destination'] ?></td>
                        <td><?= $trip['start'] ?></td>
                        <td><?= $trip['price'] ?></td>
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