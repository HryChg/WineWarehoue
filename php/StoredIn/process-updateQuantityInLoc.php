<?php

include_once '../../connect.php';

$keys = $_POST['keys'];
echo $keys;
$keys = explode(',', $keys);
$wineID =$keys[0];
$locationID = $keys[1];
$quantityInLocation = $_POST['quantityInLocation'];

$conn = OpenCon();
$sql = "update StoredIn set quantityInLocation = '$quantityInLocation' where locationID = '$locationID' and wineID = '$wineID'";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}
CloseCon($conn);
?>