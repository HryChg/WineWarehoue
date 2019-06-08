<form class="ui form" action="../../php/Wine/process-updateWinePrice.php" method="post">

    Update the price of a wineB

    </br>

    </br>

    <label>Wine</label>

    <?php

    // include '../../connect.php'; 
    $conn = OpenCon();

    $result = $conn->query("select wineID from WineB");

    echo "<select name='wineID'>";

    while ($row = $result->fetch_assoc())

    {

        unset($wineID);

        $wineID = $row['wineID'];

        echo '<option value="'.$wineID.'">'.'WineID: '.$wineID.'</option>';
        // use '.' to append string

    }

    echo "</select>";

    ?>

    <br>



    <label>Wine Price </label>

    <input name="price" type="text" placeholder="Enter new price for wine">

    <br>

    <br>

    <input type="submit" value="Update">

</form>