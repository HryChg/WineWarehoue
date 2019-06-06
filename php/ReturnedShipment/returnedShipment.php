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

//Add
$shipmentID = $returnID = $returnedQuantity ='';
$errors = '';


if(isset($_POST['submit'])){
	if(empty($_POST['shipmentID']) or 
		empty($_POST['returnID']) or 
		empty($_POST['returnedQuantity'])){
		$errors = 'All fields are required';
	}

	if($errors){
		//error is echoed
	} else {
		$shipmentID = mysqli_real_escape_string($conn, $_POST['shipmentID']);
		$returnID = mysqli_real_escape_string($conn, $_POST['returnID']);
		$returnedQuantity = mysqli_real_escape_string($conn, $_POST['returnedQuantity']);
		// create sql
		$sql = "INSERT INTO ReturnedShipment VALUES('$shipmentID', '$returnID', '$returnedQuantity')";
		// save to db and check
		if(mysqli_query($conn, $sql)){
			// success
			$success = 'Added!';
			echo "<meta http-equiv='refresh' content='0'>";

		} else {
			echo 'query error: '. mysqli_error($conn);
		}
	}
}

?>

<!DOCTYPE html>
<html>

	<section class="container grey-text">
		<h4 class="center">Add a Return Shipment</h4>
		<form class="white" action="../../ui/ShippingManager/index.php" method="POST">
			<label>shipmentID</label>
			<input type="text" name="shipmentID" value="<?php echo htmlspecialchars($shipmentID) ?>">
			<label>returnID</label>
			<input type="text" name="returnID" value="<?php echo htmlspecialchars($returnID) ?>">
			<label>Returned Quantity</label>
			<input type="text" name="returnedQuantity" value="<?php echo htmlspecialchars($returnedQuantity) ?>">
			<div class="red-text"><?php echo $errors; ?></div>
			<div class="center">
				<input type="submit" name="submit" value="Submit" class="btn brand z-depth-0">
			</div>
		</form>
	</section>

</html>