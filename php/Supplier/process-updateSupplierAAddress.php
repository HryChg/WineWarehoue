<?php

include '../../connect.php';

$name = $_POST['name'];
$address = $_POST['address'];

$conn = OpenCon();

$sql = "update SupplierA set address = '$address' where name = '$name'";

if ($conn->query($sql) === TRUE) {

    echo "Record updated successfully";

} else {

    echo "Error updating record: " . $conn->error;

}
CloseCon($conn);
?>