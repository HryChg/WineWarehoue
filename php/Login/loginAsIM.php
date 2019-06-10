<?php

include '../../connect.php';

$conn = OpenCon();

$user = $_POST['user'];
$pass = $_POST['pass'];

$user = mysqli_real_escape_string($conn, $user);
$pass = mysqli_real_escape_string($conn, $pass);

    $sql = "SELECT i.employeeID
	FROM InventoryManager i
	INNER JOIN Employee e
	ON i.employeeID = e.employeeID
	WHERE e.name = '$user' AND i.password = '$pass'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    header("Location: ../../ui/InventoryManager/index.php");
    die();
} else {
    echo "NOT FOUND: username or password does not match or does not exist";
}

CloseCon($conn);

?>