<?php

include_once '../../connect.php';
include_once '../../template/input-query/create-table.php';
include '../../util/Display-IM-Header.php';
include '../../util/Display-NavBar.php';

$conn = OpenCon();
$expiry = !empty($_POST['expiry']) ? $_POST['expiry'] : '';

setStyle();
echo "<body><div class='queryResult'>";
echo "<h1>Expired Wine Results</h1>";
if (!preg_match("/[\d]{4}-[\d]{2}-[\d]{2}/", $expiry) && ($expiry != '')) {
    echo '<p>Invalid Format.</p>';
} else {
    $sql;
    if ($expiry == '') {
        $sql = "SELECT w.wineID, w.expiryDate, s.locationID, s.quantityInLocation
            FROM WineB as w
            INNER JOIN StoredIn AS s 
            ON w.wineID = s.wineID
            WHERE expiryDate < (SELECT CURDATE())";
    } else {
        $sql = "SELECT w.wineID, w.expiryDate, s.locationID, s.quantityInLocation
            FROM WineB as w
            INNER JOIN StoredIn AS s 
            ON w.wineID = s.wineID
            WHERE expiryDate < '$expiry'";
    }
    
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        myTable($conn, $sql);
    } else {
        echo "<p>0 results</p>";
    }    
}

echo '<a class="ui button" href="../../ui/InventoryManager/index.php">Back</a>';
echo "</div></body>";
CloseCon($conn);

?>