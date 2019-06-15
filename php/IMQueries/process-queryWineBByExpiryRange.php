<?php

include_once '../../connect.php';
include_once '../../template/input-query/create-table.php';
include '../../util/Display-IM-Header.php';
include '../../util/Display-NavBar.php';

$conn = OpenCon();

$lowRange = $_POST['lowRange'];
$highRange = $_POST['highRange'];
if ((!preg_match("/[\d]{4}-[\d]{2}-[\d]{2}/", $lowRange))|| (!preg_match("/[\d]{4}-[\d]{2}-[\d]{2}/", $highRange))) {
    echo 'Invalid Format.';
}
else {

$lowRangeDate = DateTime::createFromFormat('Y-m-d', $lowRange)->format('Y-m-d');
$highRangeDate = DateTime::createFromFormat('Y-m-d', $highRange)->format('Y-m-d');

$sql1 = "SELECT w.wineID, w.expiryDate, s.locationID, s.quantityInLocation
        FROM WineB as w
        INNER JOIN StoredIn AS s 
        ON w.wineID = s.wineID
        WHERE expiryDate >= '$lowRangeDate' AND expiryDate <= '$highRangeDate'";
$sql2 = "SELECT COUNT(w.wineID) AS 'Number of Wine Types'
        FROM WineB as w
        INNER JOIN StoredIn AS s 
        ON w.wineID = s.wineID
        WHERE expiryDate >= '$lowRangeDate' AND expiryDate <= '$highRangeDate'";

$result1 = $conn->query($sql1);
$result2 = $conn->query($sql2);

setStyle();
echo "<body><div class='queryResult'>";
echo "<h1>Wine Query Results</h1>";
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
}
echo '<a class="ui button" href="../../ui/InventoryManager/index.php">Back</a>';
echo "</div></body>";
CloseCon($conn);

?>