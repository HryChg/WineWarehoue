<?php
include_once '../../connect.php';
include_once '../../util/redirectHelper.php';

$wineID = $locationID = $orderID = '';
$success = $errors = '';


if (empty($_POST['wineID']) or
    empty($_POST['locationID']) or
    empty($_POST['orderID'])) {
    echo 'Error. One of your field is empty';

    return;

} else {
    $conn = OpenCon();


    $orderID = mysqli_real_escape_string($conn, $_POST['orderID']);
    $wineID = mysqli_real_escape_string($conn, $_POST['wineID']);
    $locationID = mysqli_real_escape_string($conn, $_POST['locationID']);
    $sql = "DELETE FROM OrderForWine WHERE orderID = '$orderID' AND wineID = '$wineID' AND locationID = '$locationID';";

    if (mysqli_query($conn, $sql) === TRUE) {
        redirect('http://localhost/WineWarehouse/ui/ShippingManager/index.php');
        CloseCon($conn);
        return;

    } else {
        $errMsg = 'query error: ' . mysqli_error($conn);
    }


    CloseCon($conn);
}

$_POST = array();