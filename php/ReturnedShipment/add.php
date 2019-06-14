<?php

//Add
$shipmentID = $returnID = $returnedQuantity = '';
$errors = '';


if (isset($_POST['submit'])) {
    if (empty($_POST['shipmentID']) or
        empty($_POST['returnID']) or
        empty($_POST['returnedQuantity'])) {
        $errors = 'All fields are required';
    }

    if ($errors) {
        //error is echoed
    } else {
        $shipmentID = mysqli_real_escape_string($conn, $_POST['shipmentID']);
        $returnID = mysqli_real_escape_string($conn, $_POST['returnID']);
        $returnedQuantity = mysqli_real_escape_string($conn, $_POST['returnedQuantity']);
        // create sql
        $sql = "INSERT INTO ReturnedShipment VALUES('$shipmentID', '$returnID', '$returnedQuantity')";
        // save to db and check
        if (mysqli_query($conn, $sql)) {
            // success
            $success = 'Added!';
            echo "<meta http-equiv='refresh' content='0'>";

        } else {
            echo 'query error: ' . mysqli_error($conn);
        }
    }
}


?>


<h1 class="ui header">Add a Return Shipment</h1>
<div class="ui segment">
<form class="ui form" action="../../ui/ShippingManager/index.php" method="POST">

    <div class="field">
        <input type="text" name="shipmentID" value="<?php echo htmlspecialchars($shipmentID) ?>">
        <label>shipmentID</label>
    </div>
    <div class="field">
        <input type="text" name="returnID" value="<?php echo htmlspecialchars($returnID) ?>">
        <label>returnID</label>
    </div>
    <div class="field">
        <input type="text" name="returnedQuantity" value="<?php echo htmlspecialchars($returnedQuantity) ?>">
        <label>Returned Quantity</label>
    </div>
    <div class="red-text"><?php echo $errors; ?></div>
    <input type="submit" name="submit" value="Add" class="ui primary button">

</form>
</div>
