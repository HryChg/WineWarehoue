<?php

// EXAMPLE OF USE: 
// include '../../template/input-query/create-table.php';
// $sql = "SELECT * FROM Restock";
// $result = mysqli_query($conn, $sql);
// myTable($conn, $sql);

function myTable($obConn, $sql)

{

    $rsResult = mysqli_query($obConn, $sql) or die(mysqli_error($obConn));

    if (mysqli_num_rows($rsResult) > 0) {

//We start with header. >>>Here we retrieve the field names<<<

        echo "<table class=\"ui celled striped table\"><tbody><tr>";

        $i = 0;

        while ($i < mysqli_num_fields($rsResult)) {

            $field = mysqli_fetch_field_direct($rsResult, $i);

            $fieldName = $field->name;

            echo "<th>$fieldName</th>";

            $i = $i + 1;

        }

        echo "</tr>"; //>>>Field names retrieved<<<

//We dump info

        $bolWhite = true;

        while ($row = mysqli_fetch_assoc($rsResult)) {
            echo "<tr>";
            foreach ($row as $data) {
                echo "<td>$data</td>";
            }
            echo "</tr>";
        }
        echo "</tbody></table>";

    }

}