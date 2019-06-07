<?php
include '../../connect.php';

/* Attempt MySQL server connection. */
$conn = OpenCon();

// Escape user inputs for security
$employeeID = mysqli_real_escape_string($conn, $_POST['employeeID']);



$sql = "DELETE FROM Employee WHERE employeeID = $employeeID;";
$result = mysqli_query($conn, $sql);


if (!$result) {
    echo "Record unable to be deleted.";
    echo "<br/>";
}
if ($result) {
    echo "Record has been deleted";
    echo "<br/>";
}


CloseCon($conn);
?>