<?php

include_once '../../connect.php';
include_once '../../template/input-query/create-table.php';


if (isset($_POST['action'])) {
    if ($_POST['action'] == 'queryBestTransportationMode') {
        $conn = OpenCon();

        $queries = [
          "CREATE VIEW difference_view AS
          SELECT transportationMode, TIMESTAMPDIFF(SECOND, expectedDeliveryDate, actualDeliveryDate) AS difference 
          FROM SHIPMENT;",
          "SELECT transportationMode
          FROM difference_view
          GROUP by transportationMode
          ORDER by difference DESC
          LIMIT 1"
      ];

      foreach ($queries as $query) {
        $result = $conn->query($query);

        if ($result) {
            myTable($conn, $query);
        }
    }


    CloseCon($conn);
}
}

?>
