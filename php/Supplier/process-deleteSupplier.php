<?php

include_once '../../connect.php';

$name = $_POST['name'];
$supplierID = $_POST['supplierID'];
$phoneNo = $_POST['phoneNo'];

$conn = OpenCon();

$sql;
if (empty($name) && empty($supplierID) && empty($phoneNo)) {
    // do nothing
} elseif (!empty($name)) {
    $sql = "DELETE from SupplierB where address =
                (SELECT address FROM SupplierA where name = '$name');
            DELETE from SupplierA where name = '$name';";
} else {
    $sql = "DELETE from SupplierA where address = 
                (SELECT address FROM SupplierB where supplierID = '$supplierID' or phoneNo = '$phoneNo');
            DELETE from SupplierB where supplierID = '$supplierID' or phoneNo = '$phoneNo'";
}

if ($conn->multi_query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}
CloseCon($conn);
?>