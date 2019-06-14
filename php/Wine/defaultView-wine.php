<!-- Wine (with WineOrigin) -->

<?php

include_once '../../connect.php';
include_once '../../template/input-query/create-table.php';

$conn = OpenCon();

$sql = "SELECT b.*, a.wineTaste1, a.wineTaste2 
        FROM WineA AS a 
        JOIN WineB AS b 
        ON a.grapeType1 = b.grapeType1 AND a.grapeType2 = b.grapeType2 AND a.brandName = b.brandName 
        JOIN WineOrigin AS o ON b.wineID = o.wineID";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
        myTable($conn, $sql);
    } else {
        echo "0 results";
    }

CloseCon($conn);

?>