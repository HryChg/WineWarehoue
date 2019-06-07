<?php

include '../../connect.php';

$conn = openCon();

// init all variable as empty str
$orderID = mysqli_real_escape_string($conn, $_POST['orderID']);


// get submitted keys in _POST
$postedKeys = array_keys($_POST);

// populate that attributes array with escaped strings
$attributes = array();
foreach ($postedKeys as $item) {
    if ($item == 'orderID') continue; // skip adding orderID
    $escapedStr = mysqli_real_escape_string($conn, $item);
    array_push($attributes, $escapedStr);
}

// construct the sql string
$partialStr = 'update OrderReceived ';
for ($i = 0; $i < count($attributes) - 1; $i++) {
    $newVal = $_POST[$attributes[$i]];
    $partialStr = $partialStr."set $attributes[$i] = $newVal, ";
}
$lastIndex = count($attributes) - 1;
$newVal = $_POST[$attributes[$lastIndex]];
$partialStr = $partialStr."set $attributes[$lastIndex] = $newVal ";
$partialStr = $partialStr." where orderID = $orderID";


print_r($postedKeys);
print_r($attributes);
printf($partialStr);



$sql = $partialStr;
if ($conn->query($sql) === TRUE) {
    echo '<br/>';
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

closeCon($conn);


function collect($conn)
{
    if (mysqli_real_escape_string($conn, $_POST['backorder']) == 'Undefined') {
        echo 'backorder is null';
    }
}


function updateOrder($orderID, $col, $newVal)
{
    $conn = OpenCon();
    $sql = "update OrderReceived set '$col' = '$newVal' where orderID = '$orderID'";
    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }
    closeCon($conn);
}

?>