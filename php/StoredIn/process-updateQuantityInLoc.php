<?php

include '../../connect.php';

$locationID = $_POST['locationID'];
$wineID = $_POST['wineID'];
$quantityInLocation = $_POST['quantityInLocation'];

$conn = OpenCon();

$sql = "update StoredIn set quantityInLocation = '$quantityInLocation' where locationID = '$locationID' and wineID = '$wineID'";

if ($conn->query($sql) === TRUE) {

    echo "Record updated successfully";

} else {

    echo "Error updating record: " . $conn->error;

}

?>