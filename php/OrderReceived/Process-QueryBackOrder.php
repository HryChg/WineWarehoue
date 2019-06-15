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



//if ($result->num_rows > 0) {
//    // Table is scrollable when data is large
//
//    echo "
//<div class='table-container'>
//    <table class='ui celled striped table'>
//        <thead>
//            <th colspan='16'>
//                View All BackOrders
//            </th>
//        </thead>
//        <tr>
//            <th class='border-class'>orderID</th>
//            <th class='border-class'>employeeID</th>
//            <th class='borderclass'>wineID</th>
//            <th class='borderclass'>quantity</th>
//            <th class='borderclass'>retailer</th>
//            <th class='borderclass'>address</th>
//            <th class='borderclass'>backorder</th>
//            <th class='borderclass'>orderReceivedDate</th>
//        </tr>
//        ";
//
//    // output data of each row
//    while ($row = $result->fetch_assoc()) {
//        echo "
//        <tr>
//            <td class='borderclass'>" . $row["orderID"] . "</td>
//            <td class='borderclass'>" . $row["employeeID"] . "</td>
//            <td class='borderclass'>" . $row["wineID"] . "</td>
//            <td class='borderclass'>" . $row["quantity"] . "</td>
//            <td class='borderclass'>" . $row["retailer"] . "</td>
//            <td class='borderclass'>" . $row["address"] . "</td>
//            <td class='borderclass'>" . $row["backorder"] . "</td>
//            <td class='borderclass'>" . $row["orderReceivedDate"] . "</td>
//        </tr>";
//    }
//    echo "</table> </div>";
//
//
//} else {
//    echo "0 results";
//}

if ($result->num_rows > 0) {
    myTable($conn, $sql);
} else {
    echo "0 results";
}

CloseCon($conn);

?>