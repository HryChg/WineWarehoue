<?php
include_once '../../connect.php'; 
$conn = OpenCon();
?>

<script src="./../../php/StoredIn/insert-submit.js"></script>
<form class="ui form" id="storedin-form" method="post" url="./../../php/StoredIn/insert.php">
    <h3>Add Inventory</h3>
    <div class="field">
        <label for="id">Wine ID</label>
        <?php
        $result = $conn->query("select wineID from WineB");
        echo "<select name='wineID'>";
        echo '<option value="">---Select wineID---</option>';
        while ($row = $result->fetch_assoc())
        {
            unset($wineID);
            $wineID = $row['wineID'];
            echo '<option value="'.$wineID.'">'.$wineID.'</option>';
        }
        echo "</select>";
        ?>
    </div>
    <div class="field">
        <label for="location">Location</label>
        <?php
        $result = $conn->query("select locationID from StorageArea");
        echo "<select name='locationID'>";
        echo '<option value="">---Select locationID---</option>';
        while ($row = $result->fetch_assoc())
        {
            unset($locationID);
            $locationID = $row['locationID'];
            echo '<option value="'.$locationID.'">'.$locationID.'</option>';
        }
        echo "</select>";
        ?>
    </div>
    <div class="field">
        <label for="quantity">Quantity</label>
        <input type="text" name="quantity" id="quantity">
    </div>
    <input class="ui primary button storedin-submit" type="submit" value="Add">
</form>

<?php
CloseCon($conn);
?>