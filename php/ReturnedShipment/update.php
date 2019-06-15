<?php

function displayReturnAttributes($conn)
{
    $result = $conn->query("select shipmentID, returnID from ReturnedShipment");

    echo "<select name='drop_menu'>";

    while ($row = $result->fetch_assoc()) {
        unset($shipmentID, $returnID);
        $shipmentID = $row['shipmentID'];
        $returnID = $row['returnID'];
        echo '<option value="' . $shipmentID . ',' . $returnID . '">' . 'shipmentID: ' . $shipmentID . ', returnID: ' . $returnID . '</option>';
        // use '.' to append string

    }
    echo "</select>";
}

$shipmentID = $returnID = $returnedQuantity = '';
$errors = $success = '';

if (isset($_POST['submit_update'])) {
    if (empty($_POST['returnedQuantity'])) {
        $errors = 'Field are required';
    }

    if ($errors) {
        //error is echoed
    } else {
        $exploded = explode(',', $_POST['drop_menu']);
        $shipmentID = mysqli_real_escape_string($conn, $exploded[0]);
        $returnID = mysqli_real_escape_string($conn, $exploded[1]);
        $returnedQuantity = mysqli_real_escape_string($conn, $_POST['returnedQuantity']);
        // create sql
        $sql = "UPDATE ReturnedShipment SET returnedQuantity='$returnedQuantity' WHERE shipmentID='$shipmentID' AND returnID='$returnID'";
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
<h1 class="ui header">Update Returned Shipment</h1>
<div class="ui segment">
    <form class="ui form" method="POST">

        <h4>Select the return shipment you would like to update:</h4>
        <?php displayReturnAttributes($conn); ?>

        <h4>Enter the values needed to be updated</h4>
        <div class="fields">
            <div class="field">
                <input name="returnedQuantity" type="text">
                <label for="returnedQuantity">Returned Quantity</label>
            </div>
        </div>
        <div class="red-text"><?php echo $errors; ?></div>
        <div class="red-text"><?php echo $success; ?></div>
        <input class="positive ui button" type="submit" value="Update" name=submit_update>
    </form>
</div>


