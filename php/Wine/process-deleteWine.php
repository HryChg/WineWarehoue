<?php

include_once '../../connect.php';

$brandName = $_POST['brandName'];
$wineID = $_POST['wineID'];
$regionName = $_POST['regionName'];

$conn = OpenCon();

$sql;
if (!empty($brandName)) {
    $sql = "DELETE from WineOrigin where wineID = 
                (SELECT wineID from WineB where brandName = '$brandName');
            DELETE from WineA where brandName = '$brandName'; 
            DELETE from WineB where brandName = '$brandName'";
} elseif (!empty($wineID)) {
    $sql = "DELETE from WineOrigin where wineID = '$wineID';
            DELETE from WineB where wineID = '$wineID'";
} elseif (!empty($regionName)) {
    $sql = "SET FOREIGN_KEY_CHECKS = 0;
            DELETE from WineB where wineID IN (SELECT wineID from WineOrigin where regionName = '$regionName');
            DELETE from WineOrigin where regionName = '$regionName';";
}

if ($conn->multi_query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

$sql_reset_fk = "SET FOREIGN_KEY_CHECKS = 1;";
$conn->query($sql_reset_fk);

CloseCon($conn);

?>