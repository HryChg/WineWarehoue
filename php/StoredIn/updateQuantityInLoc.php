<script src="./../../php/StoredIn/update-submit.js"></script>
<form class="ui form" id="update-storedin" url="./../../php/StoredIn/process-updateQuantityInLoc.php" method="post">

    <h3>Update Wine Quantity in Storage</h3>
    <p>
    <label>WineID and Location</label>

    <?php

    include_once '../../connect.php'; 
    $conn = OpenCon();

    $result = $conn->query("select locationID, wineID from StoredIn");

    echo "<select name='keys'>";

    while ($row = $result->fetch_assoc())
    {
        unset($locationID, $wineID);

        $locationID = $row['locationID'];
        $wineID = $row['wineID'];

        echo '<option value="'.$wineID.','.$locationID.'">'.'WineID: '.$wineID.', LocationID: '.$locationID.'</option>';
    }

    echo "</select></p>";

    CloseCon($conn);
    ?>

    <p>
    <label>New Quantity</label>

    <input name="quantityInLocation" type="text" placeholder="Enter new quantity">
    </p>
    <input class="ui button update-storedin" type="submit" value="Update">

</form>