<form class="ui form" action="../../php/Supplier/process-deleteSupplierA.php" method="post">

    Delete a tuple from SupplierA using name

    </br>

    </br>

    <label>SupplierA</label>

    <?php

    // include '../../connect.php'; 
    $conn = OpenCon();

    $result = $conn->query("select name, address from SupplierA");

    echo "<select name='address'>";

    while ($row = $result->fetch_assoc())

    {

        unset($name, $address);

        $name = $row['name'];
        $address = $row['address'];

        echo '<option value="'.$address.'">'.'Name: '.$name.', Address: '.$address.'</option>';
        // use '.' to append string

    }

    echo "</select>";

    ?>


    <input type="submit" value="Delete">

</form>