<?php

include '../../connect.php';

$conn = OpenCon();
$sql = "SELECT orderID, employeeID, wineID  FROM OrderReceived";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    echo "<table><tr><th class='border-class'>orderID</th><th class='border-class'>employeeID</th><th class='borderclass'>wineID</th></tr>";

    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td class='borderclass'>".$row["orderID"]."</td><td class='borderclass'>".$row["employeeID"]."</td><td class='borderclass'>".$row["wineID"]."</td></tr>";
    }
    echo "</table>";



} else {
    echo "0 results";
}

#CloseCon($conn);

?>