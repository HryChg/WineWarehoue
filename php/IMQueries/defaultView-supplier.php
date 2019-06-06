<!-- Supplier -->

<?php

include '../../connect.php';
include '../../template/input-query/create-table.php';

$conn = OpenCon();

$sql = "SELECT b.supplierID, a.name, b.phoneNo, b.address 
        FROM SupplierA AS a 
        INNER JOIN SupplierB AS b 
        ON a.address = b.address";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
        myTable($conn, $sql);
    } else {
        echo "0 results";
    }

CloseCon($conn);

?>