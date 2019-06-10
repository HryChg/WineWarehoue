<?php

include '../../connect.php';
include '../../template/input-query/create-table.php';
include '../../util/Display-IM-Header.php';
include '../../util/Display-NavBar.php';

$conn = OpenCon();

$wineID = $_POST['wineID'];
$locationID = $_POST['locationID'];

$result;
if (!empty($wineID) && !empty($locationID)) {
    $sql = "SELECT wineID, locationID, quantityInLocation
	FROM StoredIn
    WHERE wineID = '$wineID' AND locationID = '$locationID'";
    $result = $conn->query($sql);
} elseif (!empty($wineID)) {
    $sql = "SELECT wineID, locationID, quantityInLocation
	FROM StoredIn
    WHERE wineID = '$wineID'";
    $result = $conn->query($sql);
} elseif (!empty($locationID)) {
    $sql = "SELECT wineID, locationID, quantityInLocation
	FROM StoredIn
    WHERE locationID = '$locationID'";
    $result = $conn->query($sql);
}

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