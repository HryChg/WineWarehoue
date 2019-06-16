<?php
include '../../connect.php';
include '../../template/input-query/create-table.php';

/* Attempt MySQL server connection. */

$conn = OpenCon();
// Escape user inputs for security
$employeeID = mysqli_real_escape_string($conn, $_POST['employeeID']);
$type = mysqli_real_escape_string($conn, $_POST['type']);
$name = mysqli_real_escape_string($conn, $_POST['name']);


// Attempt insert query execution
$sql = "INSERT INTO Employee VALUES ('$employeeID', '$type', '$name', 'Y')";
$result = mysqli_query($conn, $sql);


if (!$result) {
    echo "Record unable to be added.";
    echo 'query error: ' . mysqli_error($conn);
    echo "<br/>";
}
if ($result) {
    echo "Record has been added";
    echo "<br/>";
}


CloseCon($conn);
?>