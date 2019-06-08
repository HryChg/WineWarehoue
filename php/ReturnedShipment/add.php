<?php 

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
 		<div class="row">
 			<div class="col s3">
 				<div class="input">
 					<input type="text" name="shipmentID" value="<?php echo htmlspecialchars($shipmentID) ?>">
 					<label>shipmentID</label>
 				</div>
 			</div>


 			<div class="col s3">
 				<div class="input">
 					<input type="text" name="returnID" value="<?php echo htmlspecialchars($returnID) ?>">
 					<label>returnID</label>
 				</div>
 			</div>


 			<div class="col s3">
 				<div class="input">
 					<input type="text" name="returnedQuantity" value="<?php echo htmlspecialchars($returnedQuantity) ?>">
 					<label>Returned Quantity</label>
 				</div>
 			</div>


 		</div>
 		<div class="red-text"><?php echo $errors; ?></div>
 		<div class="center">
 			<input type="submit" name="submit" value="Add" class="waves-effect waves-light btn">
 		</div>
 	</form>
 </section>


 </html>