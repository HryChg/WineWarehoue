<form class="ui form" action="../../php/Supplier/process-deleteSupplierA.php" method="post">

    <h3>Delete a tuple from SupplierA using name</h3>

    <p>
    <label>SupplierA</label>

    <?php

    include_once '../../connect.php'; 
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

    echo "</select></p>";
    CloseCon($conn);
    ?>


    <input class="ui button" type="submit" value="Delete">

</form>