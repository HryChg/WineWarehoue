<?php

include '../../connect.php';
include '../../template/input-query/create-table.php';

$conn = OpenCon();

$lowRange = $_POST['lowRange'];
$highRange = $_POST['highRange'];

$sql = "SELECT wineID, brandName, grapeType1, grapeType2, alcoholPercent
	FROM wineB
	WHERE alcoholPercent >= '$lowRange' AND alcoholPercent <= '$highRange'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    myTable($conn, $sql);
} else {
    echo "0 results";
}

CloseCon($conn);

?>