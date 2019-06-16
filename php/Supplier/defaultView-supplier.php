<!-- Supplier -->
<!-- To view all Supplier data, use the following sql instead

// $sql = "SELECT b.supplierID, a.name, b.phoneNo, a.address 
//         FROM SupplierA AS a 
//         LEFT JOIN SupplierB AS b 
//         ON a.address = b.address
//         UNION
//         SELECT b.supplierID, a.name, b.phoneNo, b.address 
//         FROM SupplierA AS a 
//         RIGHT JOIN SupplierB AS b 
//         ON a.address = b.address
//         ORDER BY supplierID;";

Decided to show only full contact information 
as Managers may not find much use without all the information
** SQL has no FULL JOIN **-->

<?php

include_once '../../connect.php';
include_once '../../template/input-query/create-table.php';

$conn = OpenCon();

// $sql = "SELECT b.supplierID, a.name, b.phoneNo, b.address 
//         FROM SupplierA AS a 
//         INNER JOIN SupplierB AS b 
//         ON a.address = b.address";

$sql = "SELECT b.supplierID, a.name, b.phoneNo, a.address 
        FROM SupplierA a 
        LEFT JOIN SupplierB b 
        ON a.address = b.address
        UNION
        SELECT b.supplierID, a.name, b.phoneNo, b.address 
        FROM SupplierA a 
        RIGHT JOIN SupplierB b 
        ON a.address = b.address
        ORDER BY supplierID;";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
	echo "<div class='table-container'>";
	myTable($conn, $sql);
	echo "</div>";
} else {
	echo "<p>0 results</p>";
}

CloseCon($conn);

?>