<form action="../../php/Supplier/process-updateSupplierAAddress.php" method="post">

    Update the address of a SupplierA

    </br>

    </br>

    <label>Supplier</label>

    <?php

    // include '../../connect.php'; 
    $conn = OpenCon();

    $result = $conn->query("select name from SupplierA");

    echo "<select name='name'>";

    while ($row = $result->fetch_assoc())

    {

        unset($name);

        $name = $row['name'];

        echo '<option value="'.$name.'">'.'Supplier: '.$name.'</option>';
        // use '.' to append string

    }

    echo "</select>";

    ?>

    <br>



    <label>SupplierA Address </label>

    <input name="address" type="text" placeholder="Enter new address">

    <br>

    <br>

    <input type="submit" value="Update">

</form>