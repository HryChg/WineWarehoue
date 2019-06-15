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

setStyle();
echo "<body><div class='queryResult'>";
echo "<h1>Wine Inventory Results</h1>";
if ($result->num_rows > 0) {
    myTable($conn, $sql);
} else {
    echo "0 results";
}

echo '<a class="ui button" href="../../ui/InventoryManager/index.php">Back</a>';
echo "</div></body>";
CloseCon($conn);

?>