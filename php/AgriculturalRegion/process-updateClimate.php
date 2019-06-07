<?php

include '../../connect.php';

$name = $_POST['name'];
$climate = $_POST['climate'];

$conn = OpenCon();

$sql = "update AgriculturalRegion set climate = '$climate' where name = '$name'";

if ($conn->query($sql) === TRUE) {

    echo "Record updated successfully";

} else {

    echo "Error updating record: " . $conn->error;

}
CloseCon($conn);
?>