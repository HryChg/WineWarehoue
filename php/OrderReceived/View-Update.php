<?php
function displayOrderAttributes(){
    $conn = OpenCon();
    $result = $conn->query("SHOW COLUMNS FROM OrderReceived");
    if (!$result) {
        echo 'Could not show columns from OrderReceived';
        exit;
    }
    echo "<select name='column' class='ui dropdown'>";
    while ($row = $result->fetch_assoc())
    {
        unset($type);
        $type = $row['Field'];
        if ($type == 'orderID') continue;
        echo '<option value="'.$type.'">'.$type.'</option>';
    }
    echo "</select>";
    CloseCon($conn);
}

?>


<div class="container">

    <form action="../../php/OrderReceived/Process-Update.php" method="post">
        <h4>Update Order</h4>
        Update the quantity of an order

        <br/>
        <label>OrderReceived</label>

        <?php
        // openConn declared in ShippingManagerUI/index,php
        $result = $conn->query("select orderID, retailer from OrderReceived");

        echo "<select name='orderID' class='ui dropdown'>";

        while ($row = $result->fetch_assoc())
        {
            unset($orderID, $retailer);
            $orderID = $row['orderID'];
            $retailer = $row['retailer'];
            echo '<option value="'.$orderID.'">'.'OrderID: '.$orderID.' '.$retailer.'</option>';
            // use '.' to append string

        }

        echo "</select>";

        ?>

        <br>



<!--        <label>Order Quantity </label>-->
<!--        <input name="quantity" type="text" placeholder="Enter new quantity">-->
<!--        <br/>-->


        <div class="row">
            <div>
                <div class="input">
                    <input placeholder="" name="employeeID" type="text" class="validate">
                    <label for="employeeID">employeeID</label>
                </div>
            </div>
            <div>
                <div class="input">
                    <input placeholder="" name="wineID" type="text" class="validate">
                    <label for="wineID">wineID</label>
                </div>
            </div>
            <div>
                <div class="input">
                    <input placeholder="" name="quantity" type="text" class="validate">
                    <label for="quantity">quantity</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div>
                <div class="input">
                    <input placeholder="" name="retailer" type="text" class="validate">
                    <label for="retailer">retailer</label>
                </div>
            </div>
            <div>
                <div class="input">
                    <input placeholder="" name="address" type="text" class="validate">
                    <label for="address">address</label>
                </div>
            </div>
            <div>
                <div class="input">
                    <input placeholder="" name="backorder" type="text" class="validate">
                    <label for="backorder">backorder</label>
                </div>
            </div>
            <div>
                <div class="input">
                    <input placeholder="" name="orderReceivedDate" type="text" class="validate">
                    <label for="orderReceivedDate">orderReceivedDate</label>
                </div>
            </div>
        </div>



        <div class="row center">
            <input class="waves-effect waves-light btn" type="submit" value="Update">
        </div>

    </form>
</div>