<?php

include '../../connect.php';

$name = $_POST['name'];

$conn = OpenCon();

$sql = "delete from SupplierA where name = '$name'";

if ($conn->query($sql) === TRUE) {

    echo "Record updated successfully";

} else {

    echo "Error updating record: " . $conn->error;

}
CloseCon($conn);
?>