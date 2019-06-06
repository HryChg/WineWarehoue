<?php

include '../../connect.php';

$conn = OpenCon();

$wineID = $_POST['wineID'];

$sql = "SELECT wineID, locationID, quantityInLocation
	FROM StoredIn
	WHERE wineID = '$wineID'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {

    echo "<table><tr><th class='border-class'>wineID</th><th class='borderclass'>locationID</th><th class='borderclass'>quantityInLocation</th></tr>";

    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td class='borderclass'>".$row["wineID"]."</td><td class='borderclass'>".$row["locationID"]."</td><td class='borderclass'>".$row["quantityInLocation"]."</td></tr>";
    }
    echo "</table>";

} else {
    echo "0 results";
}

CloseCon($conn);

?>