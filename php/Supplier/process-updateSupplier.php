<?php

include_once '../../connect.php';

$supplierID = $_POST['supplierID'];
$name = $_POST['name'];
$address = $_POST['address'];
$phoneNo = $_POST['phoneNo'];

$conn = OpenCon();
$resultA; $resultB;
// If both supplierID and name are empty, alert error
if (!empty($supplierID) && !empty($name)) {
    // do nothing
} elseif (!empty($address)) { // address update
    // Given name:
    if (!empty($name)) {
        // update address of SupplierB
        $sqlB = "UPDATE supplierb SET address = '$address'
        WHERE address = (SELECT a.address
                        FROM SupplierA a
                        WHERE a.name='$name');";
        $resultB = $conn->query($sqlB);
        // update address of SupplierA
        $sqlA = "update SupplierA set address = '$address' where name = '$name'";
        $resultA = $conn->query($sqlA);
    // Given id:
    } else if (!empty($supplierID)) {
        // update address of SupplierA
        $sqlA = "UPDATE suppliera SET address = '$address'
                WHERE address = (SELECT b.address
                                FROM SupplierB b
                                WHERE b.supplierID='$supplierID')";
        $resultA = $conn->query($sqlA);
        // update address of SupplierB
        $sqlB = "update SupplierB set address = '$address' where supplierID = '$supplierID'";
        $resultB = $conn->query($sqlB);
    }
} elseif (!empty($phoneNo)) { //phone number update
    $resultA = true;
    // Given name
    if (!empty($name)) {
        $sqlB = "UPDATE supplierb b SET phoneNo = '$phoneNo'
                WHERE b.address = (SELECT a.address
                                    FROM SupplierA a
                                    WHERE a.name='$name');";
        $resultB = $conn->query($sqlB);
    // Given id
    } else if (!empty($supplierID)) {
        $sqlB = "update SupplierB set phoneNo = '$phoneNo' where supplierID = '$supplierID'";
        $resultB = $conn->query($sqlB);
    }
}

if ($resultA && $resultB) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}
CloseCon($conn);
?>