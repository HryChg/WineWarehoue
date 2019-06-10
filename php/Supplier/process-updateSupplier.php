<?php

include '../../connect.php';

$supplierID = $_POST['supplierID'];
$name = $_POST['name'];
$address = $_POST['address'];
$phoneNo = $_POST['phoneNo'];

$conn = OpenCon();

if (!empty($address)) {
    $sql1 = "update SupplierA set address = '$address' where name = '$name'";
    $result1 = $conn->query($sql1);
}
if (!empty($phoneNo)) {
    $sql2 = "update SupplierB set phoneNo = '$phoneNo' where supplierID = '$supplierID'";
    $result2 = $conn->query($sql2);
}


if ($result1 || $result2) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}
CloseCon($conn);
?>