<!--To identify top 10 wines where every retailer has ordered-->
<?php

include_once '../../connect.php';
include_once '../../template/input-query/create-table.php';

// TODO have to use division at some point
// TODO populate at least two wine that every retailer has bought

if (isset($_POST['action'])) {
    if ($_POST['action'] == 'queryTopThreeWineEveryRetailerOrdered') {

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
                LIMIT 3";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            myTable($conn, $sql);
        } else {
            echo "0 results";
        }

        CloseCon($conn);

    }
}
?>