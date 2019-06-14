<?php
include_once '../../connect.php';
include_once '../../template/input-query/create-table.php';

$conn = OpenCon();

$orderID = mysqli_real_escape_string($conn, $_POST['orderID']);
$wineID = mysqli_real_escape_string($conn, $_POST['wineID']);
$locationID = mysqli_real_escape_string($conn, $_POST['locationID']);


$sql = "DELETE FROM OrderForWine WHERE orderID = '$orderID' AND wineID = '$wineID' AND locationID = '$locationID';";
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