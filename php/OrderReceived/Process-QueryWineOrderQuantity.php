<?php
require_once '../../connect.php';
include_once '../../template/input-query/create-table.php';
$conn = OpenCon();

$sql = "
  SELECT wineID, SUM(quantity) as totalQuantity
  FROM OrderReceived
  GROUP BY wineID
  ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    myTable($conn, $sql);
} else {
    echo "0 results";
}

CloseCon($conn);
?>