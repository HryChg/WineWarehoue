<?php

// include '../../connect.php';

$address = $_POST['address'];

$conn = OpenCon();

$sql = "delete from SupplierA where address = '$address'";

if ($conn->query($sql) === TRUE) {

    echo "Record updated successfully";

} else {

    echo "Error updating record: " . $conn->error;

}
CloseCon($conn);
?>