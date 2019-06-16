<?php

include_once '../../connect.php';
include_once '../../template/input-query/create-table.php';


if (isset($_POST['action'])) {
    if ($_POST['action'] == 'queryBestTransportationMode') {
        $conn = OpenCon();

        $sql = "SELECT transportationMode
        FROM Shipment
        WHERE TIMESTAMPDIFF(SECOND, expectedDeliveryDate, actualDeliveryDate)>= ALL 
            (SELECT TIMESTAMPDIFF(SECOND, expectedDeliveryDate, actualDeliveryDate) FROM Shipment);";

        $result = $conn->query($sql);

        if ($result) {
            myTable($conn, $sql);
        }
    }

    CloseCon($conn);
}

?>
