<?php

include_once '../../connect.php';

$brandName = $_POST['brandName'];

$conn = OpenCon();

$sql = "delete from WineA where brandName = '$brandName'; delete from WineB where brandName = '$brandName'";

if ($conn->query($sql) === TRUE) {

    echo "Record updated successfully";

} else {

    echo "Error updating record: " . $conn->error;

}
CloseCon($conn);

?>