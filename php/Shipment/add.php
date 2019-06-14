<?php

//Add
$shipmentID = $transportationMode = $expectedDeliveryDate = $actualDeliveryDate = $orderID = $employeeID = '';
$errors = '';


if (isset($_POST['submit'])) {
    if (empty($_POST['shipmentID']) or
        empty($_POST['transportationMode']) or
        empty($_POST['expectedDeliveryDate']) or
        empty($_POST['actualDeliveryDate']) or
        empty($_POST['orderID']) or
        empty($_POST['employeeID'])) {
        $errors = 'All fields are required';
    }

    if ($errors) {
        //error is echoed
    } else {
        $shipmentID = mysqli_real_escape_string($conn, $_POST['shipmentID']);
        $transportationMode = mysqli_real_escape_string($conn, $_POST['transportationMode']);
        $expectedDeliveryDate = mysqli_real_escape_string($conn, $_POST['expectedDeliveryDate']);
        $actualDeliveryDate = mysqli_real_escape_string($conn, $_POST['actualDeliveryDate']);
        $orderID = mysqli_real_escape_string($conn, $_POST['orderID']);
        $employeeID = mysqli_real_escape_string($conn, $_POST['employeeID']);
        // create sql
        $sql = "INSERT INTO Shipment VALUES('$shipmentID', '$transportationMode', '$expectedDeliveryDate','$actualDeliveryDate','$orderID', '$employeeID')";
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


<h1 class="ui header">Add a Shipment</h1>
<form class="ui form" action="../../ui/ShippingManager/index.php" method="POST">
    <div class="field">
        <input type="text" name="shipmentID" value="<?php echo htmlspecialchars($shipmentID) ?>">
        <label>shipmentID</label>
    </div>
    <div class="field">
        <input type="text" name="transportationMode"
               value="<?php echo htmlspecialchars($transportationMode) ?>">
        <label>Transportation Mode</label>
    </div>
    <div class="field">
        <input type="text" name="expectedDeliveryDate"
               value="<?php echo htmlspecialchars($expectedDeliveryDate) ?>">
        <label>Expected Delivery Date</label>
    </div>
    <div class="field">
        <input type="text" name="actualDeliveryDate"
               value="<?php echo htmlspecialchars($actualDeliveryDate) ?>">
        <label>Actual Delivery Date</label>
    </div>
    <div class="field">
        <input type="text" name="orderID" value="<?php echo htmlspecialchars($orderID) ?>">
        <label>orderID</label>
    </div>
    <div class="field">
        <input type="text" name="employeeID" value="<?php echo htmlspecialchars($employeeID) ?>">
        <label>employeeID</label>
    </div>
    <div class="red-text"><?php echo $errors; ?></div>
    <div class="center">
        <input class="ui primary button" type="submit" name="submit" value="Add">
    </div>
</form>
