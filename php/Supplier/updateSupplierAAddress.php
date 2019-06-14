<form class="ui form" action="../../php/Supplier/process-updateSupplierAAddress.php" method="post">

    <h3>Update the address of a SupplierA</h3>

    <label>Supplier</label>

    <?php

    include_once '../../connect.php'; 
    $conn = OpenCon();

    $result = $conn->query("select name from SupplierA");

    echo "<p><select name='name'>";

    while ($row = $result->fetch_assoc())

    {

        unset($name);

        $name = $row['name'];

        echo '<option value="'.$name.'">'.'Supplier: '.$name.'</option>';

    }

    echo "</select></p>";
    CloseCon($conn);
    ?>

    <p>
        <label>SupplierA Address </label>
        <input name="address" type="text" placeholder="Enter new address">
    </p>

    <input class="ui button" type="submit" value="Update">

</form>