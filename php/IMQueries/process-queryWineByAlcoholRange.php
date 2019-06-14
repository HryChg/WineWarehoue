<?php

include_once '../../connect.php';
include_once '../../template/input-query/create-table.php';

$conn = OpenCon();

$lowRange = $_POST['lowRange'];
$highRange = $_POST['highRange'];

$sql1 = "SELECT wineID, brandName, grapeType1, grapeType2, alcoholPercent
	FROM wineB
	WHERE alcoholPercent >= '$lowRange' AND alcoholPercent <= '$highRange'";

$sql2 = "SELECT COUNT(wineID)
	FROM wineB
	WHERE alcoholPercent >= '$lowRange' AND alcoholPercent <= '$highRange'";

$result1 = $conn->query($sql1);
$result2 = $conn->query($sql2);

if ($result1->num_rows > 0) {
    myTable($conn, $sql1);
} else {
    echo "0 results";
}
if ($result2->num_rows > 0) {
    myTable($conn, $sql2);
} else {
    echo "0 results";
}

CloseCon($conn);

?>