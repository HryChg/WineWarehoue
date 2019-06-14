<form class="ui form" action="../../php/IMQueries/process-queryLocationAndQuantityByWineID.php" method="post">

    <h3>Search for Wine in Storage</h3>

    <!-- Selection dropdown -->
    <!-- <label>WineID</label>
    <?php 
    // include_once '../../connect.php'; 
    // $conn = OpenCon();
    // $result = $conn->query("select wineID from StoredIn");

    // echo "<select name='wineID'>";
    // echo '<option value="">---Select wineID---</option>';
    // while ($row = $result->fetch_assoc()) {
    //     unset($wineID);
    //     $name = $row['wineID'];
    //     echo '<option value="'.$wineID.'">'.$wineID.'</option>';
    // }

    // echo "</select></p>";
    // CloseCon($conn);
    ?> -->
    <p>
        <label>WineID</label>
        <input type="text" name="wineID">
    </p>
    <p>
        <label>LocationID</label>
        <input type="text" name="locationID">
    </p>
    <input class="ui button" type="submit" value="Query">

</form>
