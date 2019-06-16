<?php
include '../../connect.php';
include '../../template/input-query/create-table.php';
include '../../util/Display-IM-Header.php';

/* Attempt MySQL server connection. */

$conn = OpenCon();
// Escape user inputs for security
$employeeID = mysqli_real_escape_string($conn, $_POST['employeeID']);
$type = mysqli_real_escape_string($conn, $_POST['type']);
$name = mysqli_real_escape_string($conn, $_POST['name']);
$pass = mysqli_real_escape_string($conn, $_POST['password']);
$confirmPass = mysqli_real_escape_string($conn, $_POST['confirmPassword']);

setStyle();
echo "<body><div>";
// Attempt insert query execution

if ($pass == $confirmPass) {
    $sql = "INSERT INTO Employee VALUES ('$employeeID', '$type', '$name', 'Y')";
    $result = mysqli_query($conn, $sql);
    if ($type == 'InventoryManager') {
        $sql1 = "INSERT INTO InventoryManager VALUES ('$employeeID', '$pass')";
        $result1 = mysqli_query($conn, $sql1);
    } else if ($type == 'ShippingManager') {
        $sql2 = "INSERT INTO ShippingManager VALUES ('$employeeID', '$pass')";
        $result2 = mysqli_query($conn, $sql2);
    } else if ($type == 'GeneralManager') {
        $sql3 = "INSERT INTO GeneralManager VALUES ('$employeeID', '$pass')";
        $result3 = mysqli_query($conn, $sql3);
    }
} else {
    echo "passwords do not match";
}


if (!$result) {
    echo "Record unable to be added.";
    echo 'query error: ' . mysqli_error($conn);
    echo "<br/>";
}
if ($result) {
    echo "Record has been added";
    echo "<br/>";
}
echo '<a class="ui button" href="../../ui/GeneralManager/index.php">Back</a>';
echo "</div></body>";

CloseCon($conn);
?>