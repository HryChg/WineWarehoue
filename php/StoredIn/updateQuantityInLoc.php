<form class="ui form" action="../../php/StoredIn/process-updateQuantityInLoc.php" method="post">

    Update Wine Quantity in Storage

    </br>

    </br>

    <label>StoredIn Wine and Location</label>

    <?php

    // include '../../connect.php'; 
    $conn = OpenCon();

    $result = $conn->query("select locationID, wineID from StoredIn");

    echo "<select name='keys'>";

    while ($row = $result->fetch_assoc())
    {
        unset($locationID, $wineID);

        $locationID = $row['locationID'];
        $wineID = $row['wineID'];

        echo '<option value="'.$locationID.','.$wineID.'">'.'LocationID: '.$locationID.', WineID: '.$wineID.'</option>';

        // use '.' to append string
    }

    echo "</select>";


    ?>

    <br>
    <label>StoredIn Quantity</label>

    <input name="quantityInLocation" type="text" placeholder="Enter new quantity">

    <input type="submit" value="Update">

</form>