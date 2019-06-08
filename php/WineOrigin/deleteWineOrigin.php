<form class="ui form" action="../../php/WineOrigin/process-deleteWineOrigin.php" method="post">

    Delete a tuple from WineOrigin using regionName and wineID

    </br>

    </br>

    <label>Wine Origin</label>

    <?php

    // include '../../connect.php'; 
    $conn = OpenCon();

    $result = $conn->query("select regionName, wineID from WineOrigin");

    echo "<select name='keys'>";

    while ($row = $result->fetch_assoc())
    {
        unset($regionName, $wineID);

        $regionName = $row['regionName'];
        $wineID = $row['wineID'];

        echo '<option value="'.$regionName.','.$wineID.'">'.'RegionName: '.$regionName.', WineID: '.$wineID.'</option>';

        // use '.' to append string
    }

    echo "</select>";


    ?>


    <input type="submit" value="Delete">

</form>