<?php

include '../../connect.php';

$conn = OpenCon();

$grapeType = $_POST['grapeType'];

$sql = "SELECT brandName, grapeType1, grapeType2
	FROM wineA
	WHERE grapeType1 = '$grapeType' OR grapeType2 = '$grapeType'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {

    echo "<table><tr><th class='border-class'>brandName</th><th class='border-class'>grapeType1</th><th class='borderclass'>grapeType2</th></tr>";

    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td class='borderclass'>".$row["brandName"]."</td><td class='borderclass'>".$row["grapeType1"]."</td><td class='borderclass'>".$row["grapeType2"]."</td></tr>";
    }
    echo "</table>";

} else {
    echo "0 results";
}

CloseCon($conn);

?>