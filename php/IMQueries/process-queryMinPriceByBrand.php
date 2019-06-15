<?php

include_once '../../connect.php';
include_once '../../template/input-query/create-table.php';
include '../../util/Display-IM-Header.php';
include '../../util/Display-NavBar.php';

$conn = OpenCon();

$brandName = $_POST['brandName'];

$sql = "SELECT w.brandName, w.grapeType1, w.grapeType2, w.price
        from 
        (select brandName, grapeType1, grapeType2, price from wineb where brandName = '$brandName') w
        INNER JOIN
        (SELECT brandName, MIN(price) AS min from wineb GROUP BY brandName) m
        ON w.brandName = m.brandName AND w.price = m.min";



$result = $conn->query($sql);

setStyle();
displayNav("Inventory Manager");
echo "<h1>Wine Query Results</h1>";
if ($result->num_rows > 0) {
    // setStyle();
    // displayNav("Inventory Manager");
    // echo "<h1>Wine Query Results</h1>";
    myTable($conn, $sql);
} else {
    echo "0 results";
}

CloseCon($conn);

?>