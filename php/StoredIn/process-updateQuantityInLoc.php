<?php

include '../../connect.php';

$keys = $_POST['keys'];
$keys = explode(',', $keys);
$locationID = $keys[0];
$wineID =$keys[1];
$quantityInLocation = $_POST['quantityInLocation'];

$conn = OpenCon();


$sql = "update StoredIn set quantityInLocation = '$quantityInLocation' where locationID = '$locationID' and wineID = '$wineID'";
echo $sql;

if ($conn->query($sql) === TRUE) {

    echo "Record updated successfully";

} else {

    echo "Error updating record: " . $conn->error;

}

?>