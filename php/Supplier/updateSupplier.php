<script src="./../../php/Supplier/update-submit-supplier.js"></script>
<form class="ui form" id="update-supplier" url="../../php/Supplier/process-updateSupplier.php" method="post">

    <h3>Update Supplier</h3>
    <p>Choose <b>one</b> of the following:</p>

    <?php
    include_once '../../connect.php'; 
    $conn = OpenCon();

    $sql1 = "SELECT a.name FROM SupplierA a ORDER BY a.name";
    $result1 = $conn->query($sql1);

    echo "<div class='field'>
        <label>Supplier</label>";
    echo "<select name='name'>";
    echo '<option value="">---Select name---</option>';
    while ($row = $result1->fetch_assoc()){
        unset($name);
        $name = $row['name'];
        echo '<option value="'.$name.'">'.$name.'</option>';
    }
    echo "</select></div>";

    $sql2 = "SELECT b.supplierID FROM SupplierB b ORDER BY b.supplierID";
    $result2 = $conn->query($sql2);
    echo "<div class='field'>";
    echo "<select name='supplierID'>";
    echo '<option value="">---Select supplierID---</option>';
    while ($row = $result2->fetch_assoc()) {
        unset($supplierID);
        $supplierID = $row['supplierID'];
        echo '<option value="'.$supplierID.'">'.$supplierID.'</option>';
    }
    echo "</select></div>";
    CloseCon($conn);
    ?>
    <div class='field'>
        <label>New Phone </label>
        <input name="phoneNo" type="text" placeholder="Enter new phoneNo">
    </div>
    <div class='field'>
        <label>New Address </label>
        <input name="address" type="text" placeholder="Enter new address">
    </div>

    <input class="ui positive button update-supplier" type="submit" value="Update">

</form>