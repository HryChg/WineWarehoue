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
    <table>
        <tr>
            <th class='border-class'>orderID</th>
            <th class='border-class'>employeeID</th>
            <th class='borderclass'>wineID</th>
            <th class='borderclass'>quantity</th>
            <th class='borderclass'>retailer</th>
            <th class='borderclass'>address</th>
            <th class='borderclass'>backorder</th>
            <th class='borderclass'>orderReceivedDate</th>
        </tr>
        ";

    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "
        <tr>
            <td class='borderclass'>".$row["orderID"]."</td>
            <td class='borderclass'>".$row["employeeID"]."</td>
            <td class='borderclass'>".$row["wineID"]."</td>
            <td class='borderclass'>".$row["quantity"]."</td>
            <td class='borderclass'>".$row["retailer"]."</td>
            <td class='borderclass'>".$row["address"]."</td>
            <td class='borderclass'>".$row["backorder"]."</td>
            <td class='borderclass'>".$row["orderReceivedDate"]."</td>
        </tr>";
    }
    echo "</table>";



} else {
    echo "0 results";
}

?>