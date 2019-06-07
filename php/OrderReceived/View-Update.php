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



        <label>Order Quantity </label>

        <input name="quantity" type="text" placeholder="Enter new quantity">

        <br/>
<!--        --><?php //displayOrderAttributes() ?>

        <div class="row center">
            <input class="waves-effect waves-light btn" type="submit" value="Update">
        </div>

    </form>
</div>