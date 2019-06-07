<!-- Agricultural Region (with WineID)  -->

<?php

// include '../../connect.php';
// include '../../template/input-query/create-table.php';

$conn = OpenCon();

$sql = "SELECT w.wineID, a.* 
        FROM WineOrigin AS w 
        INNER JOIN AgriculturalRegion AS a 
        ON w.regionName = a.name";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
        myTable($conn, $sql);
    } else {
        echo "0 results";
    }

CloseCon($conn);

?>

