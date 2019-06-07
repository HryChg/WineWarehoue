<?php

include '../../connect.php';
include '../../template/input-query/create-table.php';

$conn = OpenCon();

$grapeType = $_POST['grapeType'];

$sql = "SELECT brandName, grapeType1, grapeType2
	FROM wineA
	WHERE grapeType1 = '$grapeType' OR grapeType2 = '$grapeType'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    myTable($conn, $sql);
} else {
    echo "0 results";
}

CloseCon($conn);

?>