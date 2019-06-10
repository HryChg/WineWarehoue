<?php 

$sql = "
SELECT orderID, wineID, locationID
FROM OrderForWine";

$result = $conn->query($sql);

if ($result->num_rows > 0) {

	echo "
	<table class='ui celled striped table'>
	<tr>
	<th class='border-class'>orderID</th>
	<th class='border-class'>wineID</th>
	<th class='borderclass'>locationID</th>
	</tr>
	";

    // output data of each row
	while($row = $result->fetch_assoc()) {
		echo "
		<tr>
		<td class='borderclass'>".$row["orderID"]."</td>
		<td class='borderclass'>".$row["wineID"]."</td>
		<td class='borderclass'>".$row["locationID"]."</td>
		</tr>";
	}
	echo "</table>";

} else {
	echo "0 results";
}

?>