<?php

// include '../../connect.php';

$locationID = $_POST['locationID'];
$temperature = $_POST['temperature'];

$conn = OpenCon();

$sql = "update StorageArea set temperature = '$temperature' where locationID = '$locationID'";

if ($conn->query($sql) === TRUE) {

    echo "Record updated successfully";

} else {

    echo "Error updating record: " . $conn->error;

}
CloseCon($conn);
?>