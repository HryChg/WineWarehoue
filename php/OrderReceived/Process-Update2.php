<?php

include '../../connect.php';

$conn = openCon();

$orderID = $_POST['orderID'];
$quantity = $_POST['quantity'];

// init all variable as empty str
$orderID = '';
$employeeID = '';
$wineID = '';
$quantity = '';
$retailer = '';
$address = '';
$backorder = '';
$orderReceivedDate = '';

// collect vars in an array
$attributes = array(
    "orderID" => $orderID,
    "employeeID" => $orderID,
    "wineID" => $wineID,
    "quantity" => $quantity,
    "retailer" => $retailer,
    "address" => $address,
    "backorder" => $backorder,
    "orderReceivedDate" => $orderReceivedDate,
);

// get submitted keys in _POST
$postKeys = array_keys($_POST);

print_r($postKeys);

// populate posted keys in attribute
foreach ($postKeys as $item) {
    echo $item;
    $attributes[$item] = mysqli_real_escape_string($conn, $item);
}

// filter out empty strings, we now have
// a list of posted attributes applied with mysqli_real_escape_string
$filteredArray = array_filter($attributes, function ($var) {
    echo $var;
    return ($var !== '');
});






$sql = "update OrderReceived set quantity = '$quantity' where orderID = '$orderID'";
if ($conn->query($sql) === TRUE) {
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