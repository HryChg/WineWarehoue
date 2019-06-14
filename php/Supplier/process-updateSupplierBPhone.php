<?php

include_once '../../connect.php';

$supplierID = $_POST['supplierID'];
$phoneNo = $_POST['phoneNo'];

$conn = OpenCon();

$sql = "update SupplierB set phoneNo = '$phoneNo' where supplierID = '$supplierID'";

if ($conn->query($sql) === TRUE) {

    echo "Record updated successfully";

} else {

    echo "Error updating record: " . $conn->error;

}
CloseCon($conn);
?>