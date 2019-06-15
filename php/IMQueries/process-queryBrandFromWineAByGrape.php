<?php

include_once '../../connect.php';
include_once '../../template/input-query/create-table.php';
include '../../util/Display-IM-Header.php';
include '../../util/Display-NavBar.php';

$conn = OpenCon();

$grapeType = $_POST['grapeType'];

$sql = "SELECT brandName, grapeType1, grapeType2
	FROM wineA
	WHERE grapeType1 = '$grapeType' OR grapeType2 = '$grapeType'";

$result = $conn->query($sql);

setStyle();
displayNav("Inventory Manager");
echo "<h1>Wine Query Results</h1>";
if ($result->num_rows > 0) {
    myTable($conn, $sql);
} else {
    echo "0 results";
}

CloseCon($conn);

?>