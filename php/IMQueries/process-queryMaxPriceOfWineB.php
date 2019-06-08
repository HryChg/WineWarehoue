<?php

include '../../connect.php';
include '../../template/input-query/create-table.php';

    $conn = OpenCon();

    $sql = "SELECT wineID, brandName, grapeType1, grapeType2, price 
            FROM WineB AS p 
            INNER JOIN 
            ( SELECT MAX(price) AS max FROM WineB ) AS m 
            ON p.price = m.max";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        myTable($conn, $sql);
    } else {
        echo "0 results";
    }
    CloseCon($conn);

?>