<!--find the top 10 most repeatedly ordered Wine-->
<?php

include_once '../../connect.php';
include_once '../../template/input-query/create-table.php';

if (isset($_POST['action'])) {
    if ($_POST['action'] == 'queryTopTenRepeatWineOrder') {


        $conn = OpenCon();

        $sql = "SELECT wineID, count(wineID) as RepeatedOrder
        FROM OrderReceived
        GROUP BY wineID
        ORDER BY RepeatedOrder DESC
        LIMIT 10";

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