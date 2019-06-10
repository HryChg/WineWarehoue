<form class="ui form" action="../../php/StorageArea/process-updateStorageTemp.php" method="post">

    <h3>Update the Storage Area</h3>

    <label>Location ID</label>

    <?php

    // include '../../connect.php'; 
    $conn = OpenCon();

    $result = $conn->query("select locationID from StorageArea");

    echo "<select name='locationID'>";

    while ($row = $result->fetch_assoc()) {
        unset($locationID);
        $locationID = $row['locationID'];
        echo '<option value="'.$locationID.'">'.'LocationID: '.$locationID.'</option>';
    }

    echo "</select>";

    ?>

    <p>
        <label>Temperature </label>
        <input name="temperature" type="text" placeholder="Enter new temp for location">
    </p>

    <input class="ui button" type="submit" value="Update">

</form>