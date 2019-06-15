<!-- Data has been restricted to show only if in both tables -->

<script src="./../../php/Supplier/delete-submit-supplier-id.js"></script>
<form class="ui form" id="delete-supplier-id" url="../../php/Supplier/process-deleteSupplierBByIDOrPhone.php" method="post">

    <h3>Delete Supplier by supplierID (SupplierB) or phoneNo</h3>

    <label>SupplierB supplierID and/or phoneNo</label>

    <?php

    include_once '../../connect.php'; 
    $conn = OpenCon();

    $sql1 = "SELECT b.supplierID FROM SupplierB b ORDER BY b.supplierID";
    $result1 = $conn->query($sql1);

    echo "<p><select name='supplierID'>";

    echo '<option value="">---Select supplierID---</option>';
    while ($row = $result1->fetch_assoc())
    {
        unset($supplierID);
        $supplierID = $row['supplierID'];
        echo '<option value="'.$supplierID.'">'.$supplierID.'</option>';
    }

    echo "</select></p>";
    $sql2 = "SELECT b.phoneNo FROM SupplierB b ORDER BY b.phoneNo";
    $result2 = $conn->query($sql2);

    echo "<p><select name='phoneNo'>";
    echo '<option value="">---Select phoneNo---</option>';
    while ($row = $result2->fetch_assoc())
    {
        unset($phoneNo);
        $phoneNo = $row['phoneNo'];
        echo '<option value="'.$phoneNo.'">'.$phoneNo.'</option>';
    }

    echo "</select></p>";
    CloseCon($conn);

    ?>

    <input class="ui red button delete-supplier-id" type="submit" value="Delete">

</form>