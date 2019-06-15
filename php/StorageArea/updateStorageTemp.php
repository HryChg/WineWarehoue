<script src="./../../php/StorageArea/update-submit.js"></script>
<form class="ui form" id="update-storage-temp" url="../../php/StorageArea/process-updateStorageTemp.php" method="post">

    <h3>Update Storage Temperature</h3>

    <?php

    include_once '../../connect.php'; 
    $conn = OpenCon();

    $result = $conn->query("select locationID from StorageArea");

    echo "<div class='field'>
        <label>Location ID</label>";
    echo "<select name='locationID'>";
    echo '<option value="">---Select locationID---</option>';
    while ($row = $result->fetch_assoc()) {
        unset($locationID);
        $locationID = $row['locationID'];
        echo '<option value="'.$locationID.'">'.$locationID.'</option>';
    }

    echo "</select></div>";
    CloseCon($conn);
    ?>

    <div class='field'>
        <label>Temperature </label>
        <input name="temperature" type="text" placeholder="Enter new temp for location">
    </div>

    <input class="ui positive button update-storage-temp" type="submit" value="Update">

</form>