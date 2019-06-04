<?php

include '../connect.php';

$orderID = $_POST['orderID'];
$quantity = $_POST['quantity'];

$conn = OpenCon();

$sql = "update OrderReceived set quantity = '$quantity' where orderID = '$orderID'";

if ($conn->query($sql) === TRUE) {

    echo "Record updated successfully";

} else {

    echo "Error updating record: " . $conn->error;

}

?>