<?php
require_once '../../connect.php';
$conn = OpenCon();

include_once '../../template/input-query/create-table.php';


$sql = "
  SELECT orderID, employeeID, wineID, quantity, retailer, address, backorder, orderReceivedDate  
  FROM OrderReceived
  WHERE backOrder = 'Y'
  ORDER by orderID
  ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    myTable($conn, $sql);
} else {
    echo "0 results";
}

CloseCon($conn);

?>