<?php
include_once '../../template/input-query/create-table.php';

if (isset($_POST['delete-shipment'])){

    if (isset($_POST['shipmentID'])) {
        $conn = OpenCon();
        $shipmentID = mysqli_real_escape_string($conn, $_POST['shipmentID']);
        $sql = "DELETE FROM Shipment WHERE shipmentID = '$shipmentID';";
        $result = mysqli_query($conn, $sql);


        if ($result){
            echo 'shipment deleted';
            echo "<meta http-equiv='refresh' content='0'>";
        } else {
            echo 'shipment not deleted';
        }

        $_POST = array();
    }
}




?>


<h1 class="ui header">Delete Shipment</h1>
<div class="ui segment">
    <form class="ui form container" action="../../ui/ShippingManager/index.php" method="POST">
        <div class="fields">
            <div class="field">
                <input name="shipmentID" type="text">
                <label for="shipmentID">shipmentID</label>
            </div>
        </div>
        <input class="ui red button" type="submit" value="Delete" name="delete-shipment">
    </form>
</div>
