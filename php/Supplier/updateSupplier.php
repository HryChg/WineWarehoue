<script src="./../../php/Supplier/update-submit-supplier.js"></script>
<form class="ui form" id="update-supplier" url="../../php/Supplier/process-updateSupplier.php" method="post">

    <h3>Update Supplier Details</h3>

    <label>Supplier</label>

    <?php
    include_once '../../connect.php'; 
    $conn = OpenCon();

    $sql1 = "SELECT a.name
            FROM SupplierA a 
            INNER JOIN SupplierB b 
            ON a.address = b.address";
    $result1 = $conn->query($sql1);

    echo "<select name='name'>";
    echo '<option value="">---Select name---</option>';
    while ($row = $result1->fetch_assoc()){
        unset($name);
        $name = $row['name'];
        echo '<option value="'.$name.'">'.$name.'</option>';
    }
    echo "</select>";

    $sql2 = "SELECT b.supplierID
            FROM SupplierA AS a 
            INNER JOIN SupplierB AS b 
            ON a.address = b.address";
    $result2 = $conn->query($sql2);

    echo "or<select name='supplierID'>";
    echo '<option value="">---Select supplierID---</option>';
    while ($row = $result2->fetch_assoc()) {
        unset($supplierID);
        $supplierID = $row['supplierID'];
        echo '<option value="'.$supplierID.'">'.$supplierID.'</option>';
    }
    echo "</select>";
    CloseCon($conn);
    ?>
    <p>
        <label>New Phone </label>
        <input name="phoneNo" type="text" placeholder="Enter new phoneNo">
    </p>
    <p>
        <label>New Address </label>
        <input name="address" type="text" placeholder="Enter new address">
    </p>

    <input class="ui button update-supplier" type="submit" value="Update">

</form>