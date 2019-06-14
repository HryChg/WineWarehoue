<?php

include_once '../../connect.php';
include_once '../../template/input-query/create-table.php';


if (isset($_POST['action'])) {
    if ($_POST['action'] == 'queryTopTenMostBackorderedWine') {
        $conn = OpenCon();

        $sql = "SELECT wineID, count(wineID) as wineCount
        FROM OrderReceived 
        WHERE backorder = 'Y'
        GROUP by wineID
        ORDER by wineCount DESC
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

