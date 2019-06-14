<?php
include_once '../../connect.php';
include_once '../../template/input-query/create-table.php';

/* Attempt MySQL server connection. */
$conn = OpenCon();
 
// Escape user inputs for security
$id = $_POST['id'];
$name = $_POST['name'];
$phone = $_POST['phone'];
$address = $_POST['address'];
 
// Attempt insert query execution
$sql = "INSERT INTO SupplierA VALUES ('$address', '$name')";
$resultA = mysqli_query($conn, $sql);

$sql = "INSERT INTO SupplierB VALUES ('$id', '$phone', '$address')";
$resultB = mysqli_query($conn, $sql);

if (!$resultA && !$resultB) {
    echo "Record unable to be added.";
    echo "<br/>";
} 
if (!$resultA) {
    echo "Partial record added. Invalid name or address.";
    echo "<br/>";
}
if (!$resultB) {
    echo "Partial record added. Invalid id, phone, or address.";
    echo "<br/>";
}
 
// Close connection
CloseCon($conn);
?>