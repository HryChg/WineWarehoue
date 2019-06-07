<?php

include '../connect.php';

$conn = openCon();

$orderID = mysqli_real_escape_string($conn, $_POST['orderID']);
if (is_null($orderID)){
    echo'Your Order Is is null';
    return;
}

//$sql = constructSQLString($conn, $orderID);
$sql = constructSQLStringForUpdate($conn, 'OrderReceived', 'orderID', $orderID);
if ($conn->query($sql) === TRUE) {
    echo '<br/>';
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

closeCon($conn);


//EFFECTS: inspect posted keys and create SQL string for updating every key posted
function constructSQLStringForUpdate($conn, $tableName, $primaryKeyName, $primaryKeyValue)
{
    // get submitted keys in _POST
    $postedKeys = array_keys($_POST);

    // filter out empty value in postedKeys, save the rest to $attribute
    $attributes = array();
    print_r($postedKeys);
    foreach ($postedKeys as $item) {
        if ($_POST[$item] === 'orderID') {
            continue; // skip adding orderID
        }
        if ($_POST[$item] === '') {
            continue; // skipp adding empty string
        };
        $escapedStr = mysqli_real_escape_string($conn, $item);
        array_push($attributes, $escapedStr);
    }

    // construct the sql string
    $partialStr = "update $tableName set";
    for ($i = 0; $i < count($attributes) - 1; $i++) {
        $newVal = $_POST[$attributes[$i]];
        if (!is_numeric($newVal)) {
            $newVal = addQuote($newVal);
        }
        $partialStr = $partialStr . " $attributes[$i] = $newVal, ";
    }

    // append the last bit without comma
    $lastIndex = count($attributes) - 1;
    $newVal = $_POST[$attributes[$lastIndex]];
    if (!is_numeric($newVal)) {
        $newVal = addQuote($newVal);
    }
    $partialStr = $partialStr . " $attributes[$lastIndex] = $newVal ";
    $partialStr = $partialStr . " where $primaryKeyName = $primaryKeyValue";

    return $partialStr;
}

// return a string wrapped with single quotes
function addQuote($str){
    return "'$str'";
}

?>