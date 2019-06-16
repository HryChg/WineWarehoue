<?php
include_once '../../connect.php';
include_once '../../template/input-query/create-table.php';

/* Attempt MySQL server connection. */
$conn = OpenCon();
 
// Escape user inputs for security
$employee_id = $_POST['employeeid'];
$supplier_id = $_POST['supplierid'];
$wine_id = $_POST['wineid'];
$location_id = $_POST['locationID'];
$quantity = $_POST['quantity'];
$date = $_POST['date'];
 
// Attempt insert query execution
$sql = "INSERT INTO Restock VALUES ('$employee_id', '$supplier_id', '$wine_id', '$location_id', '$quantity', DATE('$date'))";
$result = mysqli_query($conn, $sql);

if (!$result) {
    echo "Record unable to be added.";
}
 
// Close connection
CloseCon($conn);
?>
