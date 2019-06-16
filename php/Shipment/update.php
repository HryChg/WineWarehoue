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


if(isset($_POST['update_shipment_transportationMode']))
{
    if (empty($_POST['transportationMode'])) {
        $errors = 'Empty Field';
    }

    if ($errors) {
        //error is echoed
    } else {
        $shipmentID = mysqli_real_escape_string($conn, $_POST['shipmentID']);
        $transportationMode = mysqli_real_escape_string($conn, $_POST['transportationMode']);
        // create sql
        $sql = "UPDATE Shipment SET transportationMode='$transportationMode' WHERE shipmentID='$shipmentID'";
        // save to db and check 
        if (mysqli_query($conn, $sql)) {
            // success
            $success = 'Added!';
            echo "<meta http-equiv='refresh' content='0'>";

        } else {
            echo 'query error: ' . mysqli_error($conn);
        }
    }

    $_POST = array();

} else if (isset($_POST['update_shipment_orderID']))
{
     if (empty($_POST['orderID'])) {
        $errors = 'Empty Field';
    }

    if ($errors) {
        //error is echoed
    } else {
        $shipmentID = mysqli_real_escape_string($conn, $_POST['shipmentID']);
        $orderID = mysqli_real_escape_string($conn, $_POST['orderID']);
        // create sql
        $sql = "UPDATE Shipment SET orderID='$orderID' WHERE shipmentID='$shipmentID'";
        // save to db and check 
        if (mysqli_query($conn, $sql)) {
            // success
            $success = 'Added!';
            echo "<meta http-equiv='refresh' content='0'>";

        } else {
            echo 'query error: ' . mysqli_error($conn);
        }
    }

    $_POST = array();   
} else if(isset($_POST['update_shipment_employeeID']))
{
     if (empty($_POST['employeeID'])) {
        $errors = 'Empty Field';
    }

    if ($errors) {
        //error is echoed
    } else {
        $shipmentID = mysqli_real_escape_string($conn, $_POST['shipmentID']);
        $employeeID = mysqli_real_escape_string($conn, $_POST['employeeID']);
        // create sql
        $sql = "UPDATE Shipment SET employeeID='$employeeID' WHERE shipmentID='$shipmentID'";
        // save to db and check 
        if (mysqli_query($conn, $sql)) {
            // success
            $success = 'Added!';
            echo "<meta http-equiv='refresh' content='0'>";

        } else {
            echo 'query error: ' . mysqli_error($conn);
        }
    }

    $_POST = array();   
} 


?>

<h1 class="ui header">Update Shipment</h1>
<div class="ui segment">
    <form class="ui form container" method="POST">

        <h4>Select the return shipment you would like to update:</h4>
        <?php displayShipmentAttributes($conn); ?>

        <h4>Enter the values needed to be updated</h4>

            <div class="field">
                <input name="transportationMode" type="text">
                <label for="transportationMode">Transportation Mode</label>
                <div class="red-text"><?php echo $errors; ?></div>
                <input class="positive ui button" type="submit" value="Update Transportation Mode" name="update_shipment_transportationMode">
            </div>



            <div class="field">
                <input name="orderID" type="text">
                <label for="orderID">orderID</label>
                <div class="red-text"><?php echo $errors; ?></div>
                <input class="positive ui button" type="submit" value="Update orderID" name="update_shipment_orderID">
            </div>



            <div class="field">
                <input name="employeeID" type="text">
                <label for="employeeID">employeeID</label>
                <div class="red-text"><?php echo $errors; ?></div>
                <input class="positive ui button" type="submit" value="Update Employee ID" name="update_shipment_employeeID">
            </div>


    </form>
</div>
