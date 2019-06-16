<?php

include_once '../../connect.php';
include_once '../../template/input-query/create-table.php';


if (isset($_POST['action'])) {
    if ($_POST['action'] == 'queryBestTransportationMode') {
        $conn = OpenCon();

        $sql = "SELECT transportationMode
        FROM Shipment s
        WHERE TIMESTAMPDIFF(SECOND, s.actualDeliveryDate, s.expectedDeliveryDate) = 
            (SELECT MAX(TIMESTAMPDIFF(SECOND, t.actualDeliveryDate, t.expectedDeliveryDate)) FROM Shipment t);";

        $result = $conn->query($sql);

        if ($result) {
            myTable($conn, $sql);
        }
    // }
    }

    CloseCon($conn);
}

?>
