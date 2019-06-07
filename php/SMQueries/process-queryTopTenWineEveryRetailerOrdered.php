<!--To identify top 10 wines where every retailer has ordered-->
<?php

include '../../connect.php';
include '../../template/input-query/create-table.php';

$conn = OpenCon();

$sqlForRetailerCount = "SELECT COUNT(DISTINCT retailer) FROM OrderReceived";
$retailerCount = $conn->query($sqlForRetailerCount);
$row = $retailerCount->fetch_assoc();
$totalNumberOfRetailers = $row["COUNT(DISTINCT retailer)"];

$sql = "SELECT retailerCountAndQuantityForEachWine.*
FROM (
      SELECT wineID, COUNT(retailer) as retailerCount, SUM(quantity) as totalQuantity
      FROM OrderReceived
      GROUP BY wineID
      ) AS retailerCountAndQuantityForEachWine
WHERE retailerCountAndQuantityForEachWine.retailerCount = '$totalNumberOfRetailers'
ORDER BY totalQuantity DESC
LIMIT 10";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    myTable($conn, $sql);
} else {
    echo "0 results";
}

CloseCon($conn);

?>