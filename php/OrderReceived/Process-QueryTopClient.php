<?php
require_once '../../connect.php';
$conn = OpenCon();

include_once '../../template/input-query/create-table.php';


$sql = "
  SELECT retailer, COUNT(orderID) AS numOfOrders
  FROM OrderReceived
  GROUP BY retailer
  ORDER BY numOfOrders DESC
  LIMIT 5;
  ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    myTable($conn, $sql);
} else {
    echo "0 results";
}

CloseCon($conn);

?>