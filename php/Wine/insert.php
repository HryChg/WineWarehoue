<?php
include_once '../../connect.php';
include_once '../../template/input-query/create-table.php';

/* Attempt MySQL server connection. */
$conn = OpenCon();
 
// Escape user inputs for security
$wineid = $_POST['wineid'];
$price = $_POST['price'];
$color = $_POST['color'];
$brand = $_POST['brand'];
$year = $_POST['year'];
$grape1 = $_POST['grape1'];
$grape2 = $_POST['grape2'];
$taste1 = $_POST['taste1'];
$taste2 = $_POST['taste2'];
$alcohol = $_POST['alcohol'];
$acid = $_POST['acid'];
$sugar = $_POST['sugar'];
$expiry = $_POST['expiry'];
$region = $_POST['region'];
$temperature = $_POST['temperature'];
$moisture = $_POST['moisture'];
$climate = $_POST['climate'];

// Attempt insert query execution
$sql1 = "INSERT INTO WineA VALUES ('$grape1', '$grape2', '$brand', '$taste1', '$taste2')";
$result1 = mysqli_query($conn, $sql1);

$sql2 = "INSERT INTO WineB VALUES ('$wineid', '$price', '$color', '$brand', '$grape1', '$grape2', '$alcohol', '$acid', '$sugar', DATE('$expiry'))";
$result2 = mysqli_query($conn, $sql2);

$sql3 = "INSERT INTO AgriculturalRegion VALUES ('$region', '$temperature', '$moisture', '$climate')";
$result3 = mysqli_query($conn, $sql3);

$sql4 = "INSERT INTO WineOrigin VALUES ('$region', '$wineid', '$year')";
$result4 = mysqli_query($conn, $sql4);

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