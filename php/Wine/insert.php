<?php
include_once '../../connect.php';
include_once '../../template/input-query/create-table.php';

/* Attempt MySQL server connection. */
// $conn = OpenCon();
 
// Escape user inputs for security
$wineid = mysqli_real_escape_string($conn, $_REQUEST['wineid']);
$price = mysqli_real_escape_string($conn, $_REQUEST['price']);
$color = mysqli_real_escape_string($conn, $_REQUEST['color']);
$brand = mysqli_real_escape_string($conn, $_REQUEST['brand']);
$year = mysqli_real_escape_string($conn, $_REQUEST['year']);
$grape1 = mysqli_real_escape_string($conn, $_REQUEST['grape1']);
$grape2 = mysqli_real_escape_string($conn, $_REQUEST['grape2']);
$taste1 = mysqli_real_escape_string($conn, $_REQUEST['taste1']);
$taste2 = mysqli_real_escape_string($conn, $_REQUEST['taste2']);
$alcohol = mysqli_real_escape_string($conn, $_REQUEST['alcohol']);
$acid = mysqli_real_escape_string($conn, $_REQUEST['acid']);
$sugar = mysqli_real_escape_string($conn, $_REQUEST['sugar']);
$expiry = mysqli_real_escape_string($conn, $_REQUEST['expiry']);
$region = mysqli_real_escape_string($conn, $_REQUEST['region']);
$temperature = mysqli_real_escape_string($conn, $_REQUEST['temperature']);
$moisture = mysqli_real_escape_string($conn, $_REQUEST['moisture']);
$climate = mysqli_real_escape_string($conn, $_REQUEST['climate']);

// Attempt insert query execution
$sql = "INSERT INTO WineA VALUES ('$grape1', '$grape2', '$brand', '$taste1', '$taste2')";
$resultWA = mysqli_query($conn, $sql);

$sql = "INSERT INTO WineB VALUES ('$wineid', '$price', '$color', '$brand', '$grape1', '$grape2', '$alcohol', '$acid', '$sugar', DATE('$expiry'))";
echo $sql;
$resultWB = mysqli_query($conn, $sql);
var_dump($resultWB);

$sql = "INSERT INTO AgriculturalRegion VALUES ('$region', '$temperature', '$moisture', '$climate')";
$resultAR = mysqli_query($conn, $sql);

$sql = "INSERT INTO WineOrigin VALUES ('$region', '$wineid', '$year')";
$resultWO = mysqli_query($conn, $sql);

if (!$resultWA && !$resultWB && !$resultWO && !$resultAR) {
    echo "Record unable to be added.";
    echo "<br/>";
} 
if (!$resultWA) {
    echo "Partial record added. Invalid grape type, brand name, or wine taste.";
    echo "<br/>";
}
if (!$resultWB) {
    echo "Partial record added. Invalid wine details. Wine already exists.";
    echo "<br/>";
}
if (!$resultWO) {
    echo "Partial record added. Invalid wine region, barcode or year.";
    echo "<br/>";
}
if (!$resultAR) {
    echo "Partial record added. Invalid region name, temperature, moisture, or climate.";
    echo "<br/>";
}
 
// Close connection
CloseCon($conn);
?>