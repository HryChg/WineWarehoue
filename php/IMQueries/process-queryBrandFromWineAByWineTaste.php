<?php

include '../../connect.php';
include '../../template/input-query/create-table.php';

$conn = OpenCon();

$wineTaste = $_POST['wineTaste'];

$sql = "SELECT brandName, wineTaste1, wineTaste2
	FROM wineA
	WHERE wineTaste1 = '$wineTaste' OR wineTaste2 = '$wineTaste'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    myTable($conn, $sql);
} else {
    echo "0 results";
}

CloseCon($conn);

?>