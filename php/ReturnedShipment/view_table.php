<?php 

$sql = "
SELECT shipmentID, returnID, returnedQuantity  
FROM ReturnedShipment";

$result = $conn->query($sql);

if ($result->num_rows > 0) {

	echo "
	<table>
	<tr>
	<th class='border-class'>shipmentID</th>
	<th class='border-class'>returnID</th>
	<th class='borderclass'>returnedQuantity</th>
	</tr>
	";

    // output data of each row
	while($row = $result->fetch_assoc()) {
		echo "
		<tr>
		<td class='borderclass'>".$row["shipmentID"]."</td>
		<td class='borderclass'>".$row["returnID"]."</td>
		<td class='borderclass'>".$row["returnedQuantity"]."</td>
		</tr>";
	}
	echo "</table>";

} else {
	echo "0 results";
}

?>


 