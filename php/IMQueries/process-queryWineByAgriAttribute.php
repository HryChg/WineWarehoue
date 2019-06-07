<?php

//include '../../connect.php';
include '../../template/input-query/create-table.php';

$conn = OpenCon();

$attribute = $_POST['attribute'];
$val = $_POST['val'];

$sql = "SELECT w.wineID, a.name, a.$attribute, b.brandName, b.grapeType1, b.grapeType2
        FROM WineOrigin AS w 
        INNER JOIN AgriculturalRegion AS a ON w.regionName=a.name
        INNER JOIN WineB AS b ON w.wineID=b.wineID
        WHERE a.$attribute = $val";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    myTable($conn, $sql);
} else {
    echo "0 results";
}

CloseCon($conn);

?>