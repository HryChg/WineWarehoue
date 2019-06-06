<!-- Restock (with Supplier Names and Employee ID/Names): -->

<?php

include '../../connect.php';
include '../../template/input-query/create-table.php';

$conn = OpenCon();

$sql = "SELECT r.employeeID, e.name, r.supplierID, s.name, r.wineID, r.locationID, r.quantity, r.restockDate 
        FROM Restock AS r
        INNER JOIN Employee AS e
        ON r.employeeID = e.employeeID
        INNER JOIN
            (SELECT SupplierA.name, SupplierB.supplierID 
            FROM SupplierA 
            INNER JOIN SupplierB 
            ON SupplierA.address = SupplierB.address) AS s
                ON r.supplierID = s.supplierID";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
        myTable($conn, $sql);
    } else {
        echo "0 results";
    }

CloseCon($conn);

?>

