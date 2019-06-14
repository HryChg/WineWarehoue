<script src="./../../php/Supplier/delete-submit-supplier-name.js"></script>
<form class="ui form" id="delete-supplier-name" url="../../php/Supplier/process-deleteSupplierA.php" method="post">

    <h3>Delete Supplier by Name (SupplierA)</h3>

    <p>
    <label>Supplier</label>

    <?php
    include_once '../../connect.php'; 
    $conn = OpenCon();
    $sql = "SELECT a.name, a.address
            FROM SupplierA AS a 
            INNER JOIN SupplierB AS b 
            ON a.address = b.address";
    $result = $conn->query($sql);

    echo "<select name='address'>";
    while ($row = $result->fetch_assoc())
    {
        unset($name, $address);
        $name = $row['name'];
        $address = $row['address'];
        echo '<option value="'.$address.'">'.'Name: '.$name.', Address: '.$address.'</option>';
    }
    echo "</select></p>";
    CloseCon($conn);
    ?>

    <input class="ui button delete-supplier-name" type="submit" value="Delete">

</form>