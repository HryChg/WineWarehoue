<?php 

function displayShipmentAttributes($conn)
{
    $result = $conn->query("select shipmentID from Shipment");

    echo "<select name='shipmentID'>";

    while ($row = $result->fetch_assoc()) {
        unset($shipmentID);
        $shipmentID = $row['shipmentID'];
        echo '<option value="' .$shipmentID.'">' . 'shipmentID: ' . $shipmentID . '</option>';
        // use '.' to append string

    }
    echo "</select>";
}

$shipmentID = $transportationMode = $expectedDeliveryDate = $actualDeliveryDate = $orderID = $employeeID = '';
$errors = $success ='';


if(isset($_POST['submit_shipment_update']))
{
    if(empty($_POST['transportationMode']) and
    empty($_POST['expectedDeliveryDate']) and
    empty($_POST['actualDeliveryDate']) and
    empty($_POST['orderID']) and
    empty($_POST['employeeID']))
    {
        $errors = 'Nothing has been entered';
    }

    if($errors)
    {
            //error is echoed
    } else {

        $shipmentID = mysqli_real_escape_string($conn, $_POST['shipmentID']);

        //transportationMode
        if(!empty($_POST['transportationMode']))
        {
            $transportationMode = mysqli_real_escape_string($conn, $_POST['transportationMode']);

            $sql = "UPDATE Shipment SET transportationMode='$transportationMode' WHERE shipmentID='$shipmentID'";

            if(mysqli_query($conn, $sql))
            {
                // success
                $success = 'Added!';
                echo "<meta http-equiv='refresh' content='0'>";

            } else {
                echo 'query error: '. mysqli_error($conn);
            }
        }

        //expectedDelivery
        if(!empty($_POST['expectedDeliveryDate']))
        {
            $expectedDeliveryDate = mysqli_real_escape_string($conn, $_POST['expectedDeliveryDate']);

            $sql = "UPDATE Shipment SET expectedDeliveryDate='$expectedDeliveryDate' WHERE shipmentID='$shipmentID'";

            if(mysqli_query($conn, $sql))
            {
                // success
                $success = 'Added!';
                echo "<meta http-equiv='refresh' content='0'>";

            } else {
                echo 'query error: '. mysqli_error($conn);
            }
        }

        //actualDeliveryDate
        if(!empty($_POST['actualDeliveryDate']))
        {
            $actualDeliveryDate = mysqli_real_escape_string($conn, $_POST['actualDeliveryDate']);

            $sql = "UPDATE Shipment SET actualDeliveryDate='$actualDeliveryDate' WHERE shipmentID='$shipmentID'";

            if(mysqli_query($conn, $sql))
            {
                // success
                $success = 'Added!';
                echo "<meta http-equiv='refresh' content='0'>";

            } else {
                echo 'query error: '. mysqli_error($conn);
            }
        }

        //orderID
        if(!empty($_POST['orderID']))
        {
            $orderID = mysqli_real_escape_string($conn, $_POST['orderID']);

            $sql = "UPDATE Shipment SET orderID='$orderID' WHERE shipmentID='$shipmentID'";

            if(mysqli_query($conn, $sql))
            {
                // success
                $success = 'Added!';
                echo "<meta http-equiv='refresh' content='0'>";

            } else {
                echo 'query error: '. mysqli_error($conn);
            }
        }

        //employeeID
        if(!empty($_POST['employeeID']))
        {
            $employeeID = mysqli_real_escape_string($conn, $_POST['employeeID']);

            $sql = "UPDATE Shipment SET employeeID='$employeeID' WHERE shipmentID='$shipmentID'";

            if(mysqli_query($conn, $sql))
            {
                // success
                $success = 'Added!';
                echo "<meta http-equiv='refresh' content='0'>";

            } else {
                echo 'query error: '. mysqli_error($conn);
            }
        }
        
    }
}


?>

<h1 class="ui header">Update Shipment</h1>
<div class="ui segment">
<form class="ui form container" method="POST">

    <h4>Select the return shipment you would like to update:</h4>
    <?php displayShipmentAttributes($conn); ?>

    <h4>Enter the values needed to be updated</h4>
        <div class="fields">
        <div class="field">
            <input name="transportationMode" type="text">
            <label for="transportationMode">Transportation Mode</label>
        </div>
        <div class="field">
            <input name="expectedDeliveryDate" type="text">
            <label for="expectedDeliveryDate">Expected Delivery Date</label>
        </div>
        <div class="field">
            <input name="actualDeliveryDate" type="text">
            <label for="actualDeliveryDate">Actual Delivery Date</label>
        </div>
    </div>
    <div class="fields">
        <div class="field">
            <input name="orderID" type="text">
            <label for="orderID">orderID</label>
        </div>
        <div class="field">
            <input name="employeeID" type="text">
            <label for="employeeID">employeeID</label>
        </div>
    </div>
    <div class="red-text"><?php echo $errors; ?></div>
    <div class="red-text"><?php echo $success; ?></div>
    <input class="positive ui button" type="submit" value="Update" name=submit_shipment_update>
</form>
</div>
