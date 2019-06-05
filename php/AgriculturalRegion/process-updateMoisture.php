<?php

include '../../connect.php';

$name = $_POST['name'];
$moisture = $_POST['moisture'];

$conn = OpenCon();

$sql = "update AgriculturalRegion set moisture = '$moisture' where name = '$name'";

if ($conn->query($sql) === TRUE) {

    echo "Record updated successfully";

} else {

    echo "Error updating record: " . $conn->error;

}
CloseCon($conn);
?>