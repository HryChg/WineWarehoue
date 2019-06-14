<?php
include_once '../../connect.php';
include_once '../../template/input-query/create-table.php';

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
?>