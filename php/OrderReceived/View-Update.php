<?php
function displayOrderAttributes($conn){
    include_once '../../connect.php';
    $conn = openCon();
    $result = $conn->query("select orderID, retailer from OrderReceived");
    echo "<select name='orderID'>";
    while ($row = $result->fetch_assoc()) {
        unset($orderID, $retailer);
        $orderID = $row['orderID'];
        $retailer = $row['retailer'];
        echo '<option value="' . $orderID . '">' . 'OrderID: ' . $orderID . ' ' . $retailer . '</option>';
        // use '.' to append string

    }
    echo "</select>";
    CloseCon($conn);
}

?>


<h1 class="ui header">Update Order</h1>
<form class="ui form segment container" action="../../php/OrderReceived/Process-Update.php" method="post">

    <h4>Select the order you would like to update:</h4>
    <?php displayOrderAttributes($conn); ?>

    <h4>Enter the values needed to be updated</h4>
    <div class="fields">
        <div class="field">
            <input name="employeeID" type="text" class="validate">
            <label for="employeeID">employeeID</label>
        </div>
        <div class="field">
            <input name="wineID" type="text" class="validate">
            <label for="wineID">wineID</label>
        </div>
        <div class="field">
            <input name="quantity" type="text" class="validate">
            <label for="quantity">quantity</label>
        </div>
    </div>
    <div class="fields">
        <div class="field">
            <input name="retailer" type="text" class="validate">
            <label for="retailer">retailer</label>
        </div>
        <div class="field">
            <input name="address" type="text" class="validate">
            <label for="address">address</label>
        </div>
    </div>
    <div class="fields">
        <div class="field">
            <input name="backorder" type="text" class="validate">
            <label for="backorder">backorder</label>
        </div>
        <div class="field">
            <input name="orderReceivedDate" type="text" class="validate">
            <label for="orderReceivedDate">orderReceivedDate</label>
        </div>
    </div>
    <input class="positive ui button" type="submit" value="Update">
</form>