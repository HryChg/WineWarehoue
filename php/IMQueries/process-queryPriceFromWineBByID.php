<?php

include_once '../../connect.php';
include_once '../../template/input-query/create-table.php';
include '../../util/Display-IM-Header.php';
include '../../util/Display-NavBar.php';

$conn = OpenCon();

$wineID = $_POST['wineID'];

$sql = "SELECT wineID, price
	FROM wineB
	WHERE wineID = '$wineID'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    setStyle();
    displayNav("Inventory Manager");
    echo "<h1>Wine Query Results</h1>";
    myTable($conn, $sql);
} else {
    echo "0 results";
}

CloseCon($conn);

?>