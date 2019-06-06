<?php

include '../../connect.php';

$conn = OpenCon();

$wineTaste = $_POST['wineTaste'];

$sql = "SELECT brandName, wineTaste1, wineTaste2
	FROM wineA
	WHERE wineTaste1 = '$wineTaste' OR wineTaste2 = '$wineTaste'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {

    echo "<table><tr><th class='border-class'>brandName</th><th class='border-class'>wineTaste1</th><th class='borderclass'>wineTaste2</th></tr>";

    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td class='borderclass'>".$row["brandName"]."</td><td class='borderclass'>".$row["wineTaste1"]."</td><td class='borderclass'>".$row["wineTaste2"]."</td></tr>";
    }
    echo "</table>";

} else {
    echo "0 results";
}

CloseCon($conn);

?>