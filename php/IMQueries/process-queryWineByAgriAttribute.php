<?php

include_once '../../connect.php';
include_once '../../template/input-query/create-table.php';
include '../../util/Display-IM-Header.php';
include '../../util/Display-NavBar.php';

$conn = OpenCon();

$attribute = $_POST['attribute'];
$val = $_POST['val'];

$sql = "SELECT w.wineID, a.name, a.$attribute, b.brandName, b.grapeType1, b.grapeType2
        FROM WineOrigin AS w 
        INNER JOIN AgriculturalRegion AS a ON w.regionName=a.name
        INNER JOIN WineB AS b ON w.wineID=b.wineID
        WHERE a.$attribute = $val";

$result = $conn->query($sql);

setStyle();
echo "<body><div class='queryResult'>";
echo "<h1>Wine Query Results</h1>";
if ($result->num_rows > 0) {
    myTable($conn, $sql);
} else {
    echo "0 results";
}

echo '<a class="ui button" href="../../ui/InventoryManager/index.php">Back</a>';
echo "</div></body>";
CloseCon($conn);

?>