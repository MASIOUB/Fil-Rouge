I'am home for agency!!!! <br>

<?= currentId() ?> <br>

<a href="<?= createLink("logout") ?>">logout</a><br>
<a href="<?= createLink("agency/addTrip") ?>">add</a><br>
<a href="<?= createLink("agency/test") ?>">test</a><br>

<?php
foreach ($trips as $trip ) {
    echo $trip["departure"] . "<br>";
    echo $trip["destination"] . "<br>";
    echo $trip["start"] . "<br>";
    echo $trip["end"] . "<br>";
    echo $trip["time"] . "<br>";
    echo $trip["description"] . "<br>";
    echo $trip["price"] . "<br>";
    echo $trip["seats"] . "<br>";
    ?>
<a href="<?= createLink("agency/cancelTrip") . "/".$trip["id"] ?>">cancel</a><br>
<a href="<?= createLink("agency/updateTrip") . "/".$trip["id"] ?>">update</a><br>
<?php
}
?>

