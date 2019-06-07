<form action="process-updateStorageTemp.php" method="post">

    Update the temperature of a StorageArea

    </br>

    </br>

    <label>StorageArea</label>

    <?php

    // include '../../connect.php'; 
    $conn = OpenCon();

    $result = $conn->query("select locationID from StorageArea");

    echo "<select name='locationID'>";

    while ($row = $result->fetch_assoc())

    {

        unset($locationID);

        $locationID = $row['locationID'];

        echo '<option value="'.$locationID.'">'.'LocationID: '.$locationID.'</option>';
        // use '.' to append string

    }

    echo "</select>";

    ?>

    <br>



    <label>StorageArea Temperature </label>

    <input name="temperature" type="text" placeholder="Enter new temp for location">

    <input type="submit" value="Update">

</form>