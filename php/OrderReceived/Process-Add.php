<?php
include '../../connect.php';
include '../../template/input-query/create-table.php';

/* Attempt MySQL server connection. */

$conn = OpenCon();
// Escape user inputs for security
$orderID = mysqli_real_escape_string($conn, $_POST['orderID']);
$employeeID = mysqli_real_escape_string($conn, $_POST['employeeID']);
$wineID = mysqli_real_escape_string($conn, $_POST['wineID']);
$quantity = mysqli_real_escape_string($conn, $_POST['quantity']);
$retailer = mysqli_real_escape_string($conn, $_POST['retailer']);
$address = mysqli_real_escape_string($conn, $_POST['address']);
$backorder = mysqli_real_escape_string($conn, $_POST['backorder']);
$orderReceivedDate = mysqli_real_escape_string($conn, $_POST['orderReceivedDate']);


// Attempt insert query execution
$sql = "INSERT INTO OrderReceived 
  VALUES ('$orderID', '$employeeID', '$wineID', '$quantity', '$retailer','$address','$backorder','$orderReceivedDate')";
$result = mysqli_query($conn, $sql);


if (!$result) {
    echo "Record unable to be added.";

    echo "<br/>";
}
if ($result) {
    echo "Record has been added";
    myTable($conn, $sql);
    echo "<br/>";
}


CloseCon($conn);
?>