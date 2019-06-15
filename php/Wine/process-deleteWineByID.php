<?php

include_once '../../connect.php';

$wineID = $_POST['wineID'];

$conn = OpenCon();

$sql = "delete from WineB where wineID = '$wineID'";

if ($conn->query($sql) === TRUE) {

    echo "Record updated successfully";

} else {

    echo "Error updating record: " . $conn->error;

}
CloseCon($conn);
?>