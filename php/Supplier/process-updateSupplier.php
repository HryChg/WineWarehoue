<?php

include_once '../../connect.php';

$supplierID = $_POST['supplierID'];
$name = $_POST['name'];
$address = $_POST['address'];
$phoneNo = $_POST['phoneNo'];
echo '<script>alert('.$supplierID.$name.$address.$phoneNo.');</script>';
$conn = OpenCon();
// If both supplierID and name are empty, alert error
if (strpos($supplierID, '---') === false && strpos($name, '---') === false) {
    echo '<script>alert("Please select only one.");</script>'; //TODO: This echo is not working
}
// If address is present, update address
if (!empty($address)) {
    // if updating with name + address
    // update address of SupplierB
    $sql1 = "UPDATE supplierb SET address = '$address'
            WHERE address = (SELECT a.address
                            FROM SupplierA a
                            WHERE a.name='$name');";
    $result1 = $conn->query($sql1);
    // update address of SupplierA
    $sql2 = "update SupplierA set address = '$address' where name = '$name'";
    $result2 = $conn->query($sql2);

}
// If phoneNo is present, update phoneNo
if (!empty($phoneNo)) {
    $sql3 = "update SupplierB set phoneNo = '$phoneNo' where supplierID = '$supplierID'";
    $result3 = $conn->query($sql3);
}

if (($result1 && $result2) || $result3) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}
CloseCon($conn);
?>