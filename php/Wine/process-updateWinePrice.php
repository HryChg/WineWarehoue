<?php

include_once '../../connect.php';

$wineID = $_POST['wineID'];
$price = $_POST['price'];

$conn = OpenCon();

$sql = "update WineB set price = '$price' where wineID = '$wineID'";

if ($conn->query($sql) === TRUE) {

    echo "Record updated successfully";

} else {

    echo "Error updating record: " . $conn->error;

}
CloseCon($conn);
?>