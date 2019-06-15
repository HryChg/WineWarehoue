<?php

include_once '../../connect.php';

$name = $_POST['name'];
$temperature = $_POST['temperature'];
$moisture = $_POST['moisture'];
$climate = $_POST['climate'];

$conn = OpenCon();
$result1; $result2; $result3;
if (!empty($temperature)) {
    $sql1 = "update AgriculturalRegion set temperature = '$temperature' where name = '$name'";
    $result1 = $conn->query($sql1);
}
if (!empty($moisture)) {
    $sql2 = "update AgriculturalRegion set moisture = '$moisture' where name = '$name'";
    $result2 = $conn->query($sql2);
}
if (!empty($climate)) {
    $sql3 = "update AgriculturalRegion set climate = '$climate' where name = '$name'";
    $result3 = $conn->query($sql3);
}

if ($result1 || $result2 || $result3) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}
CloseCon($conn);
?>