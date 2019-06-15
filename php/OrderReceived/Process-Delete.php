<?php
include_once '../../connect.php';
include_once '../../util/redirectHelper.php';

/* Attempt MySQL server connection. */
$conn = OpenCon();

// Escape user inputs for security
$orderID = mysqli_real_escape_string($conn, $_POST['orderID']);



// Attempt insert query execution
//$sql = "INSERT INTO OrderReceived
//  VALUES ('$orderID', '$employeeID', '$wineID', '$quantity', '$retailer','$address','$backorder','$orderReceivedDate')";
$sql = "DELETE FROM OrderReceived WHERE orderID = $orderID;";
$result = mysqli_query($conn, $sql);


if (!$result) {
    echo "Record unable to be deleted.";
    echo "<br/>";
}
if ($result) {
    echo "Record has been deleted";
    echo "<br/>";

    redirect('http://localhost/WineWarehouse/ui/ShippingManager/index.php');
}


CloseCon($conn);


?>