<form action="../../php/Supplier/process-updateSupplierBPhone.php" method="post">

    Update the phone number of a SupplierB

    </br>

    </br>

    <label>Supplier</label>

    <?php

    // include '../../connect.php'; 
    $conn = OpenCon();

    $result = $conn->query("select supplierID from SupplierB");

    echo "<select name='supplierID'>";

    while ($row = $result->fetch_assoc())

    {

        unset($supplierID);

        $supplierID = $row['supplierID'];

        echo '<option value="'.$supplierID.'">'.'SupplierID: '.$supplierID.'</option>';
        // use '.' to append string

    }

    echo "</select>";

    ?>

    <br>



    <label>SupplierB Phone </label>

    <input name="phoneNo" type="text" placeholder="Enter new PhoneNo">

    <br>

    <br>

    <input type="submit" value="Update">

</form>