<?php

include '../../connect.php';

$employeeID = $_POST['employeeID'];
$name = $_POST['name'];


if (is_null($employeeID) and is_null($name)){
    echo 'variable not assigned';
}

if (isset($employeeID) and isset($name)){
    $conn = OpenCon();

    $sql = "update Employee set name = '$name' where employeeID = '$employeeID'";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }

    CloseCon($conn);
    return;
}


?>