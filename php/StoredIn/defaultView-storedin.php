<!-- StoredIn (with Wine Names) -->

<?php

include_once '../../connect.php';
include_once '../../template/input-query/create-table.php';

$conn = OpenCon();

$sql = "SELECT s.wineID, w.brandName, s.locationID, s.quantityInLocation 
        FROM WineB AS w 
        INNER JOIN StoredIn AS s 
        ON w.wineID = s.wineID;";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    myTable($conn, $sql);
} else {
    echo "<p>0 results</p>";
}

CloseCon($conn);

?>