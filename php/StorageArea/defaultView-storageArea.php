<!-- StorageArea -->

<?php

include_once '../../connect.php';
include_once '../../template/input-query/create-table.php';

$conn = OpenCon();

$sql = "SELECT * FROM StorageArea";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
	echo "<div class='table-container'>";
	myTable($conn, $sql);
	echo "</div>";
} else {
	echo "<p>0 results</p>";
}

CloseCon($conn);

?>

