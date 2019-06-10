<?php

include_once '../../connect.php';
include_once '../../template/input-query/create-table.php';

$conn = OpenCon();

$wineID = $_POST['wineID'];

$sql = "SELECT wineID, price
	FROM wineB
	WHERE wineID = '$wineID'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    myTable($conn, $sql);
} else {
    echo "0 results";
}

CloseCon($conn);

?>