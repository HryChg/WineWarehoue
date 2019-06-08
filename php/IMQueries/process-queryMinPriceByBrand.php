<?php

include '../../connect.php';
include '../../template/input-query/create-table.php';

$conn = OpenCon();

$brandName = $_POST['brandName'];

$sql = "select w.brandName, w.grapeType1, w.grapeType2, w.price
from 
(select brandName, grapeType1, grapeType2, price from wineb where brandName = '$brandName') w
INNER JOIN
(SELECT brandName, MIN(price) AS min from wineb GROUP BY brandName) m
ON w.brandName = m.brandName AND w.price = m.min";



$result = $conn->query($sql);

if ($result->num_rows > 0) {
    myTable($conn, $sql);
} else {
    echo "0 results";
}

CloseCon($conn);

?>