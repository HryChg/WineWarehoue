<form action="process-update.php" method="post">

    Update the quantity of an order

    </br>

    </br>

    <label>OrderReceived</label>

    <?php

    include '../../connect.php'; $conn = OpenCon();

    $result = $conn->query("select orderID, retailer from OrderReceived");

    echo "<select name='orderID'>";

    while ($row = $result->fetch_assoc())

    {

        unset($orderID, $retailer);

        $orderID = $row['orderID'];

        $retailer = $row['retailer'];

        echo '<option value="'.$orderID.'">'.'OrderID: '.$orderID.' '.$retailer.'</option>';
        // use '.' to append string

    }

    echo "</select>";
    CloseCon($conn);
    ?>

    <br>



    <label>Order Quantity </label>

    <input name="quantity" type="text" placeholder="Enter new quantity">

    <br>

    <br>

    <input type="submit" value="Update">

</form>