<?php

// Top 10 Most Recent Order (Latest --> Oldest)
$sql = "
  SELECT orderID, employeeID, wineID, quantity, retailer, address, backorder, orderReceivedDate  
  FROM OrderReceived
  ORDER by orderReceivedDate DESC
  LIMIT 10";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "
    <table class='ui celled striped table'>
        <thead>
            <th colspan='16'>
                Following are the 10 most recent order...
            </th>
        </thead>
    
        <tr>
            <th>orderID</th>
            <th>employeeID</th>
            <th>wineID</th>
            <th>quantity</th>
            <th>retailer</th>
            <th>address</th>
            <th>backorder</th>
            <th>orderReceivedDate</th>
        </tr>
        ";

    // output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "
        <tr>
            <td>" . $row["orderID"] . "</td>
            <td>" . $row["employeeID"] . "</td>
            <td>" . $row["wineID"] . "</td>
            <td>" . $row["quantity"] . "</td>
            <td>" . $row["retailer"] . "</td>
            <td>" . $row["address"] . "</td>
            <td>" . $row["backorder"] . "</td>
            <td>" . $row["orderReceivedDate"] . "</td>
        </tr>";
    }
    echo "</table>";


} else {
    echo "0 results";
}

?>
