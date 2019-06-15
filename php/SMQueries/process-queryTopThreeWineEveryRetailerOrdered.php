<!--To identify top 10 wines where every retailer has ordered-->
<?php

include_once '../../connect.php';
include_once '../../template/input-query/create-table.php';

if (isset($_POST['action'])) {
    if ($_POST['action'] == 'queryTopThreeWineEveryRetailerOrdered') {

        $conn = OpenCon();

        $sql = "SELECT wineID 
                FROM WineB
                WHERE wineID NOT IN (
                    SELECT w.wineID
                    FROM WineB w, OrderReceived o
                    WHERE (w.wineID, o.retailer) NOT IN (
                    SELECT wineID, retailer
                    FROM OrderReceived
                ))";

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