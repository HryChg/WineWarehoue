<?php
include '../../connect.php';
include '../../template/input-query/create-table.php';

/* Attempt MySQL server connection. */
$conn = OpenCon();
 
// Escape user inputs for security
$id = mysqli_real_escape_string($conn, $_REQUEST['id']);
$location = mysqli_real_escape_string($conn, $_REQUEST['location']);
$quantity = mysqli_real_escape_string($conn, $_REQUEST['quantity']);
 
// Attempt insert query execution
$sql = "INSERT INTO StoredIn VALUES ('$id', '$location', '$quantity')";
$result = mysqli_query($conn, $sql);

if (!$result) {
    echo "Record unable to be added.";
} 
 
// Close connection
CloseCon($conn);
?>
