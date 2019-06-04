<?php


function myTable($obConn, $sql)

{

    $rsResult = mysqli_query($obConn, $sql) or die(mysqli_error($obConn));

    if (mysqli_num_rows($rsResult) > 0) {

//We start with header. >>>Here we retrieve the field names<<<

        echo "<table width=\"100%\" border=\"0\" cellspacing=\"2\" cellpadding=\"0\"><tr align=\"center\" bgcolor=\"#CCCCCC\">";

        $i = 0;

        while ($i < mysqli_num_fields($rsResult)) {

            $field = mysqli_fetch_field_direct($rsResult, $i);

            $fieldName = $field->name;

            echo "<td><strong>$fieldName</strong></td>";

            $i = $i + 1;

        }

        echo "</tr>"; //>>>Field names retrieved<<<

//We dump info

        $bolWhite = true;

        while ($row = mysqli_fetch_assoc($rsResult)) {

            echo $bolWhite ? "<tr bgcolor=\"#CCCCCC\">" : "<tr bgcolor=\"#FFF\">";

            $bolWhite = !$bolWhite;

            foreach ($row as $data) {

                echo "<td>$data</td>";

            }

            echo "</tr>";

        }

        echo "</table>";

    }

}

include '../../connect.php';

$OrderReceived_cols = $_POST['OrderReceived_cols'];

$orderID = $_POST['orderID'];

$conn = OpenCon();


if (! isset($orderID)){
    echo 'oederID is not set';
    echo '<br>';
}
if (! isset($OrderReceived_cols)){
    echo 'OrderReceived_cols is not set';
    echo '<br>';
}

$sql = "
select $OrderReceived_cols 
from OrderReceived 
where orderID = $orderID";

myTable($conn, $sql);

?>