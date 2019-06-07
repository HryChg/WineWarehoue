<?php

// include '../../connect.php';

$supplierID = $_POST['supplierID'];
$phoneNo = $_POST['phoneNo'];

$conn = OpenCon();

$sql = "delete from SupplierB where supplierID = '$supplierID' or phoneNo = '$phoneNo'";

if ($conn->query($sql) === TRUE) {

    echo "Record updated successfully";

} else {

    echo "Error updating record: " . $conn->error;

}
CloseCon($conn);
?>