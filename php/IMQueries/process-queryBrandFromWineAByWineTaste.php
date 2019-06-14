<?php

include_once '../../connect.php';
include_once '../../template/input-query/create-table.php';
include '../../util/Display-IM-Header.php';
include '../../util/Display-NavBar.php';

$conn = OpenCon();

$wineTaste = $_POST['wineTaste'];

$sql = "SELECT brandName, wineTaste1, wineTaste2
	FROM wineA
	WHERE wineTaste1 = '$wineTaste' OR wineTaste2 = '$wineTaste'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    setStyle();
    displayNav("Inventory Manager");
    echo "<h1>Wine Inventory Results</h1>";
    myTable($conn, $sql);
} else {
    echo "0 results";
}

CloseCon($conn);

?>