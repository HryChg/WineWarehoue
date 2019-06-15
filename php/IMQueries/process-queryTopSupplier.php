<?php

include_once '../../connect.php';
include_once '../../template/input-query/create-table.php';
include '../../util/Display-IM-Header.php';
include '../../util/Display-NavBar.php';

$conn = OpenCon();
$sql = "SELECT sb.supplierID, sa.name, sa.address, sb.phoneNo, tot.total 
        FROM SupplierB AS sb
        INNER JOIN SupplierA as sa ON sb.address = sa.address
        INNER JOIN (SELECT supplierID, SUM(quantity) AS total
                    FROM Restock 
                    GROUP BY supplierID
                    ORDER BY total DESC
                    LIMIT 1) AS tot
                    ON sb.supplierID = tot.supplierID";

$result = $conn->query($sql);

setStyle();

echo "<h1>Top Supplier</h1>";
if ($result->num_rows > 0) {
    myTable($conn, $sql);
} else {
    echo "0 results";
}

echo '<a class="ui button" href="../../ui/InventoryManager/index.php">Back</a>';

CloseCon($conn);


?>