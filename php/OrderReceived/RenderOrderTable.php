<?php

include '../../connect.php';

$conn = OpenCon();
$sql = "SELECT regionName, wineID, year FROM WineOrigin";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    echo "<table><tr><th class='border-class'>regionName</th><th class='border-class'>wineID</th><th class='borderclass'>year</th></tr>";

    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td class='borderclass'>".$row["regionName"]."</td><td class='borderclass'>".$row["wineID"]."</td><td class='borderclass'>".$row["year"]."</td></tr>";
    }
    echo "</table>";



} else {
    echo "0 results";
}

CloseCon($conn);

?>