<?php
session_start();

include '../../connect.php';

$conn = OpenCon();

$user = $_POST["user"];
$pass = $_POST["pass"];

$user = mysqli_real_escape_string($conn, $user);
$pass = mysqli_real_escape_string($conn, $pass);

$sql = "SELECT g.employeeID
	FROM GeneralManager g
	INNER JOIN Employee e
	ON g.employeeID = e.employeeID
	WHERE e.name = '$user' AND g.password = '$pass' AND e.employed = 'Y'";

$result = $conn->query($sql);

if ($result->num_rows == 1) {
    printf("logged in");

    $_SESSION['username'] = $user;
    $_SESSION['employeeType'] = "GM";

    header("Location: ../../ui/GeneralManager/index.php");
    exit();
} else {
    echo "NOT FOUND: username or password does not match or does not exist";
    session_unset();
    session_destroy();
}

CloseCon($conn);

?>