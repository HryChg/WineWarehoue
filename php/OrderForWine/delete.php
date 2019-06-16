<?php
include_once '../../template/input-query/create-table.php';

$wineID = $locationID =$orderID='';
$success = $errors = '';


if (isset($_POST['delete_orderforwine'])) {
    if (empty($_POST['wineID ']) or
        empty($_POST['locationID']) or
        empty($_POST['orderID'])) {
        $errors = 'All fields are required';
}

if ($errors) {
        //error is echoed
} else {

    $orderID = mysqli_real_escape_string($conn, $_POST['orderID']);
    $wineID = mysqli_real_escape_string($conn, $_POST['wineID']);
    $locationID = mysqli_real_escape_string($conn, $_POST['locationID']);
        // create sql
    $sql ="DELETE FROM OrderForWine WHERE orderID = '$orderID' AND wineID = '$wineID' AND locationID = '$locationID';";
        // save to db and check

    echo $sql;

    if (mysqli_query($conn, $sql)) {
            // success
        $success = 'Deleted!!';
        #echo "<meta http-equiv='refresh' content='0'>";

    } else {
        echo 'query error: ' . mysqli_error($conn);
    }


}

$_POST = array();
$errors = '';
}

?>



<h1 class="ui header">Delete OrderForWine</h1>
<div class="ui segment">
    <form class="ui form" action="../../ui/ShippingManager/index.php" method="POST">
        <div class="fields">
            <div class="field">
                <input name="orderID" type="text">
                <label for="orderID">orderID</label>
            </div>
            <div class="field">
                <input name="wineID" type="text">
                <label for="wineID">wineID</label>
            </div>
            <div class="field">
                <input name="locationID" type="text">
                <label for="locationID">locationID</label>
            </div>
        </div>
        <div class="red-text"><?php echo $errors; ?></div>
        <div class="red-text"><?php echo $success; ?></div>
        <input class="ui red button" type="submit" value="Delete" name="delete_orderforwine">
    </form>
</div>
