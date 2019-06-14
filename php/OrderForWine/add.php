<?php

//Add
$orderID = $wineID = $locationID = '';
$errors = '';


if (isset($_POST['submit'])) {
    if (empty($_POST['orderID']) or
        empty($_POST['wineID']) or
        empty($_POST['locationID'])) {
        $errors = 'All fields are required';
    }

    if ($errors) {
        //error is echoed
    } else {
        $orderID = mysqli_real_escape_string($conn, $_POST['orderID']);
        $wineID = mysqli_real_escape_string($conn, $_POST['wineID']);
        $locationID = mysqli_real_escape_string($conn, $_POST['locationID']);
        // create sql
        $sql = "INSERT INTO ReturnedShipment VALUES('$orderID', '$wineID', '$locationID')";
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


<h1 class="ui header">Add a Wine Order</h1>
<div class="ui segment">
    <form class="ui form" action="../../ui/ShippingManager/index.php" method="POST">
        <div class="fields">
            <div class="field">
                <input type="text" name="orderID" value="<?php echo htmlspecialchars($orderID) ?>">
                <label>orderID</label>
            </div>
            <div class="field">
                <input type="text" name="wineID" value="<?php echo htmlspecialchars($wineID) ?>">
                <label>wineID</label>
            </div>
            <div class="field">
                <input type="text" name="locationID" value="<?php echo htmlspecialchars($locationID) ?>">
                <label>Location</label>
            </div>
        </div>
        <div class="red-text"><?php echo $errors; ?></div>

        <input type="submit" name="submit" value="Add" class="ui primary button">
    </form>
</div>