<?php
session_start();

include '../../connect.php';

$conn = OpenCon();

$user = $_POST['user'];
$pass = $_POST['pass'];
$_SESSION['user'] = NULL;

$user = mysqli_real_escape_string($conn, $user);
$pass = mysqli_real_escape_string($conn, $pass);

    $sql = "SELECT i.employeeID
	FROM InventoryManager i
	INNER JOIN Employee e
	ON i.employeeID = e.employeeID
	WHERE e.name = '$user' AND i.password = '$pass'";

$result = $conn->query($sql);

if ($result->num_rows == 1) {

    $_SESSION['user'] = $user;

    header("Location: ../../ui/InventoryManager/index.php");
    exit();
} else {
    echo "NOT FOUND: username or password does not match or does not exist";
    session_unset();
    session_destroy();
}

CloseCon($conn);

?>