<?php

include_once '../../connect.php';
include_once '../../template/input-query/create-table.php';
include '../../util/Display-IM-Header.php';
include '../../util/Display-NavBar.php';

$conn = OpenCon();

$lowRange = !empty($_POST['lowRange']) ? $_POST['lowRange'] : 0;
$highRange = !empty($_POST['highRange']) ? $_POST['highRange'] : 100;

$sql1 = "SELECT wineID, brandName, grapeType1, grapeType2, alcoholPercent
	FROM wineB
	WHERE alcoholPercent >= '$lowRange' AND alcoholPercent <= '$highRange'";

$sql2 = "SELECT COUNT(wineID) AS 'Number of Wine Types'
	FROM wineB
	WHERE alcoholPercent >= '$lowRange' AND alcoholPercent <= '$highRange'";

$result1 = $conn->query($sql1);
$result2 = $conn->query($sql2);

setStyle();
echo "<body><div class='queryResult'>";
echo "<h1>Wine Query Results</h1>";
if ($result1->num_rows > 0) {
    myTable($conn, $sql1);
} else {
    echo "<p>0 results</p>";
}
if ($result2->num_rows > 0) {
    myTable($conn, $sql2);
} else {
    echo "<p>0 results</p>";
}

echo '<p><a class="ui button" href="../../ui/InventoryManager/index.php">Back</a></p>';
echo "</div></body>";
CloseCon($conn);

?>