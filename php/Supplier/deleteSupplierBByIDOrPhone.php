<form action="process-deleteSupplierBByIDOrPhone.php" method="post">

    Delete a tuple from SupplierB using supplierID or phoneNo

    </br>

    </br>

    <label>SupplierB supplierID and/or phoneNo</label>

    <?php

    include '../../connect.php'; $conn = OpenCon();

    $result1 = $conn->query("select supplierID from SupplierB");

    echo "<select name='supplierID'>";

    echo '<option value="">---Select supplierID---</option>';
    while ($row = $result1->fetch_assoc())
    {
        unset($supplierID);
        $supplierID = $row['supplierID'];
        echo '<option value="'.$supplierID.'">'.'SupplierID: '.$supplierID.'</option>';
    }

    echo "</select>";

    $result2 = $conn->query("select phoneNo from SupplierB");

    echo "<select name='phoneNo'>";
    echo '<option value="">---Select phoneNo---</option>';
    while ($row = $result2->fetch_assoc())
    {
        unset($phoneNo);
        $phoneNo = $row['phoneNo'];
        echo '<option value="'.$phoneNo.'">'.'PhoneNo: '.$phoneNo.'</option>';
    }

    echo "</select>";


    ?>

    <input type="submit" value="Delete">

</form>