<?php
include_once '../../template/input-query/create-table.php';

$shipmentID = $returnID ='';


if (isset($_POST['return_delete'])) {
    if (empty($_POST['shipmentID']) or
        empty($_POST['returnID'])) {
        $errors = 'All fields are required';
    }

    if ($errors) {
        //error is echoed
    } else {
        $shipmentID = mysqli_real_escape_string($conn, $_POST['shipmentID']);
        $returnID = mysqli_real_escape_string($conn, $_POST['returnID']);
        // create sql
        $sql = "DELETE FROM ReturnedShipment WHERE shipmentID = '$shipmentID' AND returnID='$returnID'";
        // save to db and check
        if (mysqli_query($conn, $sql)) {
            // success
            $success = 'Deleted!!';
            echo "<meta http-equiv='refresh' content='0'>";

        } else {
            echo 'query error: ' . mysqli_error($conn);
        }


        $_POST = array();
    }
}

?>


<h1 class="ui header">Delete Returned Shipment</h1>
<div class="ui segment">
    <form class="ui form container" action="../../ui/ShippingManager/index.php" method="POST">
        <div class="fields">
            <div class="field">
                <input name="shipmentID" type="text">
                <label for="shipmentID">shipmentID</label>
            </div>
            <div class="field">
                <input name="returnID" type="text">
                <label for="returnID">returnID</label>
            </div>
        </div>
        <div class="red-text"><?php echo $errors; ?></div>
        <input class="ui red button" type="submit" value="Delete" name="return_delete">
    </form>
</div>
