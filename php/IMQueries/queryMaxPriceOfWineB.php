<form method="post">
    <label>Query Max Price of WineB</label>
    <input type="submit" name="max" value="Query">
</form>

<?php
if(array_key_exists('max',$_POST)){

    include '../../connect.php';
    $conn = OpenCon();

    $sql = "SELECT wineID, MAX(price)
            FROM WineB";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table><tr><th class='border-class'>wineID</th><th class='borderclass'>MAX(price)</th></tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr><td class='borderclass'>".$row["wineID"]."</td><td class='borderclass'>".$row["MAX(price)"]."</td></tr>";
        }
        echo "</table>";
    } else {
    echo "0 results";
    }
    CloseCon($conn);
}

?>