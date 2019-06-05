<?php

include '../../connect.php';

$name = $_POST['name'];
$temperature = $_POST['temperature'];

$conn = OpenCon();

$sql = "update AgriculturalRegion set temperature = '$temperature' where name = '$name'";

if ($conn->query($sql) === TRUE) {

    echo "Record updated successfully";

} else {

    echo "Error updating record: " . $conn->error;

}

?>