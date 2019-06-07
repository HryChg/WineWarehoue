<?php

//include '../../connect.php';
include '../../template/input-query/create-table.php';

$conn = OpenCon();

$brandName = $_POST['brandName'];

$sql = "SELECT brandName, MIN(price)
	FROM wineB
	WHERE brandName = '$brandName'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    myTable($conn, $sql);
} else {
    echo "0 results";
}

CloseCon($conn);

?>