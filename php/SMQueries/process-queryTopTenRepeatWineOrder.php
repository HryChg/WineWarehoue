<!--find the top 10 most repeatedly ordered Wine-->
<?php

include '../../connect.php';
include '../../template/input-query/create-table.php';

$conn = OpenCon();


$sql = "SELECT wineID, count(wineID) as repeatWineCount
        FROM OrderReceived
        GROUP BY wineID
        ORDER BY repeatWineCount DESC
        LIMIT 10";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    myTable($conn, $sql);
} else {
    echo "0 results";
}

CloseCon($conn);

?>