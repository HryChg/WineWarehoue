<?php
include_once '../../connect.php';
include_once '../../template/input-query/create-table.php';

echo '<script>alert("inside insert.php!")</script>';

/* Attempt MySQL server connection. */
$conn = OpenCon();
 
// Escape user inputs for security
$employee_id = $_POST['employeeid'];
$supplier_id = $_POST['supplierid'];
$wine_id = $_POST['wineid'];
$location = $_POST['location'];
$quantity = $_POST['quantity'];
$date = $_POST['date'];
 
// Attempt insert query execution
$sql = "INSERT INTO Restock VALUES ('$employee_id', '$supplier_id', '$wine_id', '$location', '$quantity', DATE('$date'))";
$result = mysqli_query($conn, $sql);

if (!$result) {
    echo "Record unable to be added.";
}
 
// Close connection
CloseCon($conn);
?>
