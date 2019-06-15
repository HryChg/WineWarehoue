<script src="./../../php/Supplier/delete-submit-supplier.js"></script>
<form class="ui form" id="delete-supplier" method="post" url="../../php/Supplier/process-deleteSupplier.php">

    <h3>Delete Supplier</h3>

    <p>
    <label>Name</label>

    <?php
    include_once '../../connect.php'; 
    $conn = OpenCon();

    // Delete by Name
    $sql = "SELECT a.name FROM SupplierA a ORDER BY a.name";
    $result = $conn->query($sql);

    echo "<select name='name'>";
    echo '<option value="">---Select name---</option>';
    while ($row = $result->fetch_assoc())
    {
        unset($name);
        $name = $row['name'];
        echo '<option value="'.$name.'">'.$name.'</option>';
    }
    echo "</select></p>";

    echo "or";

    // Delete by ID
    $sql = "SELECT supplierID FROM SupplierB ORDER BY supplierID";
    $result = $conn->query($sql);

    echo "<p><label>SupplierID</label>";
    echo "<select name='supplierID'>";
    echo '<option value="">---Select supplierID---</option>';
    while ($row = $result->fetch_assoc())
    {
        unset($supplierID);
        $supplierID = $row['supplierID'];
        echo '<option value="'.$supplierID.'">'.$supplierID.'</option>';
    }
    echo "</select></p>";

    echo "or";

    // Delete by Phone
    $sql = "SELECT phoneNo FROM SupplierB ORDER BY phoneNo";
    $result = $conn->query($sql);

    echo "<p><label>PhoneNo</label>";
    echo "<select name='phoneNo'>";
    echo '<option value="">---Select phoneNo---</option>';
    while ($row = $result->fetch_assoc())
    {
        unset($phoneNo);
        $phoneNo = $row['phoneNo'];
        echo '<option value="'.$phoneNo.'">'.$phoneNo.'</option>';
    }
    echo "</select></p>";

    CloseCon($conn);
    ?>

    <input class="ui red button delete-supplier" type="submit" value="Delete">

</form>