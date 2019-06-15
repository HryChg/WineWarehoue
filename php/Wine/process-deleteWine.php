<?php

include_once '../../connect.php';

$brandName = $_POST['brandName'];

$conn = OpenCon();

$sql = "DELETE from WineOrigin where wineID = 
            (SELECT wineID from WineB where brandName = '$brandName');
        DELETE from WineA where brandName = '$brandName'; 
        DELETE from WineB where brandName = '$brandName'";

if ($conn->multi_query($sql) === TRUE) {

    echo "Record updated successfully";

} else {

    echo "Error updating record: " . $conn->error;

}
CloseCon($conn);

?>