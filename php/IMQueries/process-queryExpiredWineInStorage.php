<?php

include_once '../../connect.php';
include_once '../../template/input-query/create-table.php';

$conn = OpenCon();
$expiry = $_POST['expiry'];
if (!preg_match("/[\d]{4}-[\d]{2}-[\d]{2}/", $expiry) && ($expiry != '')) {
    echo 'Invalid Format.';
}
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
    echo "0 results";
}

CloseCon($conn);

?>