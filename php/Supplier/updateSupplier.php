<form class="ui form" action="../../php/Supplier/process-updateSupplier.php" method="post">

    <h3>Update the address of a SupplierA</h3>

    <label>Supplier</label>

    <?php

    // include '../../connect.php'; 
    $conn = OpenCon();

    $result = $conn->query("select name from SupplierA");

    echo "<p><select name='name'>";
    echo '<option value="">---Select name---</option>';
    while ($row = $result->fetch_assoc()){
        unset($name);
        $name = $row['name'];
        echo '<option value="'.$name.'">'.'Supplier: '.$name.'</option>';
    }
    echo "</select>";

    // TODO: Figure out why certain entries remove from display -> should show null
    $result = $conn->query("select supplierID from SupplierB");

    echo "or<select name='supplierID'>";
    echo '<option value="">---Select supplierID---</option>';
    while ($row = $result->fetch_assoc()) {
        unset($supplierID);
        $supplierID = $row['supplierID'];
        echo '<option value="'.$supplierID.'">'.'SupplierID: '.$supplierID.'</option>';
    }
    echo "</select></p>";
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

    <input class="ui button" type="submit" value="Update">

</form>