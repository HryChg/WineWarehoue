<?php
include '../../connect.php';

/* Attempt MySQL server connection. */
$conn = OpenCon();

// Escape user inputs for security
$employeeID = mysqli_real_escape_string($conn, $_POST['employeeID']);
$sql = "UPDATE Employee SET employed = 'N' WHERE employeeID = $employeeID;";
$result = mysqli_query($conn, $sql);


if (!$result) {
    echo "Employee unable to be fired. <br>";
    echo 'query error: ' . mysqli_error($conn);
    echo "<br/>";
}
if ($result) {
    echo "Employee has been fired";
    echo "<br/>";
}


CloseCon($conn);
?>