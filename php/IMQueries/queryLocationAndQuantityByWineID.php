<form class="ui form" action="../../php/IMQueries/process-queryLocationAndQuantityByWineID.php" method="post">

    <h3>Search Inventory</h3>

    <!-- Selection dropdown -->
    <?php

    include_once '../../connect.php'; 
    $conn = OpenCon();

    // WineID selector
    $result = $conn->query("select distinct wineID from StoredIn");
    echo "<div class='field'>
        <label>WineID</label>
        <select name='wineID'>";
    echo '<option value="">---Select wineID---</option>';
    while ($row = $result->fetch_assoc())
    {
        unset($wineID);
        $wineID = $row['wineID'];
        echo '<option value="'.$wineID.'">'.$wineID.'</option>';
    }
    echo "</select></div>";

    // LocationID selector
    $result = $conn->query("select locationID from StorageArea");
    echo "<div class='field'>
        <label>LocationID</label>
        <select name='locationID'>";
    echo '<option value="">---Select locationID---</option>';
    while ($row = $result->fetch_assoc())
    {
        unset($locationID);
        $locationID = $row['locationID'];
        echo '<option value="'.$locationID.'">'.$locationID.'</option>';
    }
    echo "</select></div>";


    CloseCon($conn);
    ?>

    <input class="ui secondary button" type="submit" value="Query">

</form>
