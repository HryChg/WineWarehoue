<?php

include '../../connect.php';

$conn = OpenCon();

$user = $_POST['user'];
$pass = $_POST['pass'];

$user = mysqli_real_escape_string($conn, $user);
$pass = mysqli_real_escape_string($conn, $pass);


$sql = "SELECT s.employeeID
	FROM ShippingManager s
	INNER JOIN Employee e
	ON s.employeeID = e.employeeID
	WHERE e.name = '$user' AND s.password = '$pass'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    header("Location: ../../ui/ShippingManager/index.php");
    die();
} else {
    echo "NOT FOUND: username or password does not match or does not exist";
}

CloseCon($conn);

?>