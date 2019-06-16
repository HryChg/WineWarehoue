<?php

include_once '../../connect.php';
include_once '../../template/input-query/create-table.php';
include '../../util/Display-IM-Header.php';
include '../../util/Display-NavBar.php';

$conn = OpenCon();

$brandName = $_POST['brandName'];

$sql1 = "SELECT brandName, grapeType1, grapeType2, price from wineb where brandName = '$brandName'";

$sql2 = "SELECT w.brandName, w.grapeType1, w.grapeType2, w.price
        from 
        (select brandName, grapeType1, grapeType2, price from wineb where brandName = '$brandName') w
        INNER JOIN
        (SELECT brandName, MIN(price) AS min from wineb GROUP BY brandName) m
        ON w.brandName = m.brandName AND w.price = m.min";

$result1 = $conn->query($sql1);
$result2 = $conn->query($sql2);

setStyle();
echo "<body><div class='queryResult'>";
echo "<h1>Wine Brand Results</h1>";
if ($result1->num_rows > 0) {
    myTable($conn, $sql1);
} else {
    echo "<p>0 results</p>";
}
echo "<h1>Wine Brand: Minimum Price Results</h1>";
if ($result2->num_rows > 0) {
    myTable($conn, $sql2);
} else {
    echo "<p>0 results</p>";
}

echo '<a class="ui button" href="../../ui/InventoryManager/index.php">Back</a>';
echo "</div></body>";
CloseCon($conn);

?>