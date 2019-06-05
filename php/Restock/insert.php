<?php
include '../../connect.php';
include '../../template/input-query/create-table.php';

/* Attempt MySQL server connection. */
$conn = OpenCon();
 
// Escape user inputs for security
$employee_id = mysqli_real_escape_string($conn, $_REQUEST['employeeid']);
$supplier_id = mysqli_real_escape_string($conn, $_REQUEST['supplierid']);
$wine_id = mysqli_real_escape_string($conn, $_REQUEST['wineid']);
$location = mysqli_real_escape_string($conn, $_REQUEST['location']);
$quantity = mysqli_real_escape_string($conn, $_REQUEST['quantity']);
$date = mysqli_real_escape_string($conn, $_REQUEST['date']);
 
// Attempt insert query execution
$sql = "INSERT INTO Restock VALUES ('$employee_id', '$supplier_id', '$wine_id', '$location', '$quantity', DATE('$date'))";
$result = mysqli_query($conn, $sql);

if (!$result) {
    echo "Record unable to be added.";
}
 
// Close connection
CloseCon($conn);
?>