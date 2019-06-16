<?php

include '../../connect.php';
include '../../util/Display-IM-Header.php';

$keys = $_POST['keys'];
$keys = explode(',', $keys);

$employeeID = $keys[0];
$value = $_POST['value'];
$column = $_POST['column'];
$type = $keys[1];
$password = $_POST['password'];
$confirmpass = $_POST['confirmpass'];

if (is_null($employeeID) || $value=='' || is_null($column)){
    echo 'one of your variables is not set';
    return;
}


if ($column == 'type'){
    updateType($employeeID, $value, $password, $confirmpass, $type);
    return;
} else if ($column == 'name'){
    updateName($employeeID, $value);
    return;
}



function updateName($employeeID, $name){
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

function updateType($employeeID, $newType, $password, $confirmpass, $type){
    $conn = OpenCon();

    $sql = "update Employee set type = '$newType' where employeeID = $employeeID";
    $sql1 = "select * from Employee";
    $sql2 = "select * from Employee";


    if ("$type" == 'ShippingManager') {
        $sql2 = "DELETE FROM ShippingManager WHERE employeeID =$employeeID";
    } else if ("$type" == 'InventoryManager') {
        $sql2 = "DELETE FROM InventoryManager WHERE employeeID =$employeeID";
    } else if ("$type" == 'GeneralManager') {
        $sql2 = "DELETE FROM GeneralManager WHERE employeeID =$employeeID";
    }

    if (($password === $confirmpass) &&($password != "")) {
        if ($newType=="ShippingManager") {
            $sql1 = "insert into ShippingManager values($employeeID, '$password')";
        } else if ($newType=="InventoryManager") {
            $sql1 = "insert into InventoryManager values($employeeID, '$password')";
        } else if ($newType=="GeneralManager") {
            $sql1 = "insert into GeneralManager values($employeeID, '$password')";
        }
    }


    if ($conn->query($sql)) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }

    if ($conn->query($sql1)) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }

    if ($conn->query($sql2)) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }

    setStyle();
    echo "<body>";

    echo '<a class="ui button" href="../../ui/GeneralManager/index.php">Back</a>';
    echo "</body>";

    CloseCon($conn);
    return;
}



?>