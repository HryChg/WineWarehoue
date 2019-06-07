<?php
function displayOrderAttributes($conn){
    $result = $conn->query("select orderID, retailer from OrderReceived");

    echo "<select name='orderID' class='ui scrolling dropdown'>";

    while ($row = $result->fetch_assoc())
    {
        unset($orderID, $retailer);
        $orderID = $row['orderID'];
        $retailer = $row['retailer'];
        echo '<option value="'.$orderID.'">'.'OrderID: '.$orderID.' '.$retailer.'</option>';
        // use '.' to append string

    }
    echo "</select>";
}

?>


    <h1 class="ui header">Update Order</h1>
    <form class="ui form container" action="../../php/OrderReceived/Process-Update.php" method="post">


        <label>Select the order you would like to update</label>

        <?php displayOrderAttributes($conn); ?>
        
        <div class="row">
            <div>
                <div class="input">
                    <input name="employeeID" type="text" class="validate">
                    <label for="employeeID">employeeID</label>
                </div>
            </div>
            <div>
                <div class="input">
                    <input name="wineID" type="text" class="validate">
                    <label for="wineID">wineID</label>
                </div>
            </div>
            <div>
                <div class="input">
                    <input name="quantity" type="text" class="validate">
                    <label for="quantity">quantity</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div>
                <div class="input">
                    <input name="retailer" type="text" class="validate">
                    <label for="retailer">retailer</label>
                </div>
            </div>
            <div>
                <div class="input">
                    <input name="address" type="text" class="validate">
                    <label for="address">address</label>
                </div>
            </div>
            <div>
                <div class="input">
                    <input name="backorder" type="text" class="validate">
                    <label for="backorder">backorder</label>
                </div>
            </div>
            <div>
                <div class="input">
                    <input name="orderReceivedDate" type="text" class="validate">
                    <label for="orderReceivedDate">orderReceivedDate</label>
                </div>
            </div>
        </div>


        <div class="row center">
            <input type="submit" value="Update">
        </div>

    </form>