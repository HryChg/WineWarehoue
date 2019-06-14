


<?php
// Top 10 Most Recent Order (Latest --> Oldest)
require_once '../../connect.php';
$conn = OpenCon();

$sql = "
  SELECT employeeID, type, name
  FROM Employee
  ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Table is scrollable when data is large
    echo "
    <table class='ui celled striped table'>
        <tr>
            <th class='border-class'>employeeID</th>
            <th class='border-class'>type</th>
            <th class='borderclass'>name</th>
            
        </tr>
        ";

    // output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "
        <tr>
            <td class='borderclass'>" . $row["employeeID"] . "</td>
            <td class='borderclass'>" . $row["type"] . "</td>
            <td class='borderclass'>" . $row["name"] . "</td>
        </tr>";
    }
    echo "</table>";


} else {
    echo "0 results";
}


CloseCon($conn);
?>