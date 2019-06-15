<script src="./../../php/StoredIn/update-submit.js"></script>
<form class="ui form" id="update-storedin" url="./../../php/StoredIn/process-updateQuantityInLoc.php" method="post">

    <h3>Update Inventory Quantity</h3>
    <div class="field">
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
    echo "</select></div>";

    CloseCon($conn);
    ?>

    <div class="field">
    <label>New Quantity</label>
    <input name="quantityInLocation" type="text" placeholder="Enter new quantity">
    </div>

    <input class="ui positive button update-storedin" type="submit" value="Update">

</form>