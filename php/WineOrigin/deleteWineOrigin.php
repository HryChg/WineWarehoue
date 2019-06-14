<form class="ui form" action="../../php/WineOrigin/process-deleteWineOrigin.php" method="post">

    <h3>Delete a tuple from WineOrigin using regionName and wineID</h3>

    <label>Wine Origin</label>

    <?php

    include_once '../../connect.php'; 
    $conn = OpenCon();

    $result = $conn->query("select regionName, wineID from WineOrigin");

    echo "<p><select name='keys'>";

    while ($row = $result->fetch_assoc())
    {
        unset($regionName, $wineID);

        $regionName = $row['regionName'];
        $wineID = $row['wineID'];

        echo '<option value="'.$regionName.','.$wineID.'">'.'RegionName: '.$regionName.', WineID: '.$wineID.'</option>';

        // use '.' to append string
    }

    echo "</select></p>";
    CloseCon($conn);

    ?>


    <input class="ui button" type="submit" value="Delete">

</form>