<?php
include_once '../../template/input-query/create-table.php';



if (isset($_POST['return_delete'])) {
    $conn = OpenCon();
    $shipmentID = mysqli_real_escape_string($conn, $_POST['shipmentID']);
    $returnID = mysqli_real_escape_string($conn, $_POST['returnID']);
    $sql = "DELETE FROM ReturnedShipment WHERE shipmentID = '$shipmentID' AND returnID='returnID';";
    $result = mysqli_query($conn, $sql);


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
        <input class="ui red button" type="submit" value="Delete" name="return_delete">
    </form>
</div>
