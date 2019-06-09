<?php

include '../../connect.php';
include '../../template/input-query/create-table.php';
include '../../util/Display-IM-Header.php';
include '../../util/Display-NavBar.php';

    $conn = OpenCon();

<<<<<<< HEAD
    $sql = "SELECT wineID, MAX(price) AS price
            FROM WineB";
=======
    $sql = "SELECT wineID, brandName, grapeType1, grapeType2, price 
            FROM WineB AS p 
            INNER JOIN 
            ( SELECT MAX(price) AS max FROM WineB ) AS m 
            ON p.price = m.max";
>>>>>>> 0dd4d6fa3d11c37c2debe5354e0dae3e40ff7f34

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        setStyle();
        displayNav("Inventory Manager");
        echo "<h1>Most Expensive Wine</h1>";
        myTable($conn, $sql);
    } else {
        echo "0 results";
    }
    CloseCon($conn);

?>