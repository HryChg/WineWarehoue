<?php

include '../../connect.php';

$keys = $_POST['keys'];
$keys = explode(',', $keys);
$regionName = $keys[0];
$wineID =$keys[1];

$conn = OpenCon();

$sql = "delete from WineOrigin where regionName = '$regionName' and wineID = '$wineID'";

if ($conn->query($sql) === TRUE) {

    echo "Record updated successfully";

} else {

    echo "Error updating record: " . $conn->error;

}
CloseCon($conn);

?>