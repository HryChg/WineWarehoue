<?php 

$sql = "
SELECT shipmentID, transportationMode, expectedDeliveryDate, actualDeliveryDate, orderID, employeeID  
FROM Shipment";

$result = $conn->query($sql);

if ($result->num_rows > 0) {

	echo "
	<table>
	<tr>
	<th class='border-class'>shipmentID</th>
	<th class='border-class'>transportationMode</th>
	<th class='borderclass'>expectedDeliveryDate</th>
	<th class='border-class'>actualDeliveryDate</th>
	<th class='border-class'>orderID</th>
	<th class='borderclass'>employeeID</th>
	</tr>
	";

    // output data of each row
	while($row = $result->fetch_assoc()) {
		echo "
		<tr>
		<td class='borderclass'>".$row["shipmentID"]."</td>
		<td class='borderclass'>".$row["transportationMode"]."</td>
		<td class='borderclass'>".$row["expectedDeliveryDate"]."</td>
		<td class='borderclass'>".$row["actualDeliveryDate"]."</td>
		<td class='borderclass'>".$row["orderID"]."</td>
		<td class='borderclass'>".$row["employeeID"]."</td>
		</tr>";
	}
	echo "</table>";

} else {
	echo "0 results";
}

?>