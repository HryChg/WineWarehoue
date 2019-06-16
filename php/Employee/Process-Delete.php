<?php
include '../../connect.php';
include '../../util/Display-IM-Header.php';

/* Attempt MySQL server connection. */
$conn = OpenCon();

setStyle();
echo "<body><div>";

// Escape user inputs for security
$employeeID = mysqli_real_escape_string($conn, $_POST['employeeID']);

$sql = "UPDATE Employee SET employed = 'N' WHERE employeeID = $employeeID;";
$result = mysqli_query($conn, $sql);


$sql1 = "DELETE FROM ShippingManager WHERE employeeID = $employeeID;";
$result1 = mysqli_query($conn, $sql1);

$sql2 = "DELETE FROM InventoryManager WHERE employeeID = $employeeID;";
$result2 = mysqli_query($conn, $sql2);

$sql3 = "DELETE FROM GeneralManager WHERE employeeID = $employeeID;";
$result3 = mysqli_query($conn, $sql3);


if (!$result) {
    echo "Employee unable to be fired. <br>";
    echo 'query error: ' . mysqli_error($conn);
    echo "<br/>";
}
if ($result) {
    echo "Employee has been fired";
    echo "<br/>";
}

echo '<a class="ui button" href="../../ui/GeneralManager/index.php">Back</a>';
echo "</div></body>";
CloseCon($conn);
?>