<!-- Supplier -->
<!-- To view all Supplier data:

SELECT b.supplierID, a.name, b.phoneNo, a.address 
FROM SupplierA AS a 
RIGHT JOIN SupplierB AS b 
ON a.address = b.address
UNION
SELECT b.supplierID, a.name, b.phoneNo, b.address 
FROM SupplierA AS a 
RIGHT JOIN SupplierB AS b 
ON a.address = b.address

Decided to show only full contact information 
as Managers may not find much use without all the information
** SQL has no FULL JOIN **-->

<?php

include_once '../../connect.php';
include_once '../../template/input-query/create-table.php';

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