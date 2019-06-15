<?php
include_once '../../connect.php';
include_once '../../template/input-query/create-table.php';



if (isset($_POST['shipmentID'])) {
    $conn = OpenCon();
    $shipmentID = mysqli_real_escape_string($conn, $_POST['shipmentID']);
    $sql = "DELETE FROM Shipment WHERE shipmentID = '$shipmentID';";
    $result = mysqli_query($conn, $sql);


    if (!$result) {
        echo "Record unable to be deleted.";
        echo "<br/>";
    }
    if ($result) {
        echo "Record has been deleted";
        echo "<br/>";
    }


    CloseCon($conn);
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
        <input class="ui red button" type="submit" value="Delete">
    </form>
</div>
