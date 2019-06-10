<form class="ui form" action="../../php/Supplier/process-updateSupplierBPhone.php" method="post">

    <h3>Update the phone number of a SupplierB</h3>

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

    }

    echo "</select>";
    CloseCon($conn);
    ?>

    <br>


    <p>
        <label>SupplierB Phone </label>
        <input name="phoneNo" type="text" placeholder="Enter new PhoneNo">
    </p>
    <input class="ui button" type="submit" value="Update">

</form>