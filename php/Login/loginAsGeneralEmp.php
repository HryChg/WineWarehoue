<?php
session_start();

include '../../connect.php';

$conn = OpenCon();

$user = $_POST["user"];

$user = mysqli_real_escape_string($conn, $user);

$sql = "SELECT name
	FROM Employee
	WHERE name = '$user'";

$result = $conn->query($sql);

if ($result->num_rows == 1) {
    printf("logged in");

    $_SESSION['username'] = $user;

    header("Location: ../../ui/Employee/index.php");
    exit();
} else {
    echo "NOT FOUND: username or password does not match or does not exist";
    session_unset();
    session_destroy();
}

CloseCon($conn);

?>