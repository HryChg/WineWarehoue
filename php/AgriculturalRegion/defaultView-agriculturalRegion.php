<!-- Agricultural Region (with WineID)  -->
<!-- Two SQL strings are provided below:
    - one is the basic table as an inner join
    - one with more detail with a simulated outer join -->

<?php

include_once '../../connect.php';
include_once '../../template/input-query/create-table.php';

$conn = OpenCon();

// $sql = "SELECT w.wineID, a.* 
//         FROM WineOrigin AS w 
//         INNER JOIN AgriculturalRegion AS a 
//         ON w.regionName = a.name";

$sql = "SELECT w.wineID, a.* 
        FROM WineOrigin AS w 
        LEFT JOIN AgriculturalRegion AS a 
        ON w.regionName = a.name
        UNION
        SELECT w.wineID, a.* 
        FROM WineOrigin AS w 
        RIGHT JOIN AgriculturalRegion AS a 
        ON w.regionName = a.name";

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

