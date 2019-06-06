<?php

include '../../connect.php';

$conn = OpenCon();

$wineID = $_POST['wineID'];

$sql = "SELECT wineID, price
	FROM wineB
	WHERE wineID = '$wineID'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {

    echo "<table><tr><th class='border-class'>wineID</th><th class='borderclass'>price</th></tr>";

    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td class='borderclass'>".$row["wineID"]."</td><td class='borderclass'>".$row["price"]."</td></tr>";
    }
    echo "</table>";

} else {
    echo "0 results";
}

CloseCon($conn);

?>