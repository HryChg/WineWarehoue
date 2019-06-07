<?php

include '../../connect.php';


$employeeID = $_POST['employeeID'];
$value = $_POST['value'];
$column = $_POST['column'];

if (is_null($employeeID) || $value=='' || is_null($column)){
    echo 'one of your variables is not set';
    return;
}


if ($column == 'type'){
    updateType($employeeID, $value);
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

function updateType($employeeID, $type){
    $conn = OpenCon();

    $sql = "update Employee set type = '$type' where employeeID = '$employeeID'";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }

    CloseCon($conn);
    return;
}



?>