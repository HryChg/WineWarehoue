<?php
include_once '../../connect.php';
include_once '../../template/input-query/create-table.php';

/* Attempt MySQL server connection. */
$conn = OpenCon();
 
// Escape user inputs for security
$wineID = $_POST['wineID'];
$locationID = $_POST['locationID'];
$quantity = $_POST['quantity'];
 
// Attempt insert query execution
$sql = "INSERT INTO StoredIn VALUES ('$wineID', '$locationID', '$quantity')";
$result = mysqli_query($conn, $sql);
 
// Close connection
CloseCon($conn);
?>