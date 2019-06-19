<!--To identify top 10 wines where every retailer has ordered-->
<?php

include_once '../../connect.php';
include_once '../../template/input-query/create-table.php';

if (isset($_POST['action'])) {
    if ($_POST['action'] == 'queryTopThreeWineEveryRetailerOrdered') {

        $conn = OpenCon();

        $sql = "SELECT w1.wineID 
                FROM WineB w1
                WHERE NOT EXISTS(
                  SELECT w.wineID FROM WineB w, OrderReceived o1
                  WHERE NOT EXISTS (
                    SELECT o.wineID, o.retailer
                    FROM OrderReceived o
                    WHERE w.wineID = o.wineID
                      AND o1.retailer = o.retailer
                  )
                  AND w1.wineID=w.wineID
                ) 
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