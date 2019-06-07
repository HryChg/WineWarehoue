<?php

// include '../../connect.php';

$brandName = $_POST['brandName'];
$wineID = $_POST['wineID'];

$conn = OpenCon();

$sql = "delete from WineB where brandName = '$brandName' or wineID = '$wineID'";

if ($conn->query($sql) === TRUE) {

    echo "Record updated successfully";

} else {

    echo "Error updating record: " . $conn->error;

}
CloseCon($conn);
?>