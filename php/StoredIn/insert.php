<?php
include_once '../../connect.php';
include_once '../../template/input-query/create-table.php';

/* Attempt MySQL server connection. */
$conn = OpenCon();
 
// Escape user inputs for security
$id = $_POST['id'];
$location = $_POST['location'];
$quantity = $_POST['quantity'];
 
// Attempt insert query execution
$sql = "INSERT INTO StoredIn VALUES ('$id', '$location', '$quantity')";
$result = mysqli_query($conn, $sql);
 
// Close connection
CloseCon($conn);
?>