<form class="ui form" action="../../php/IMQueries/process-queryLocationAndQuantityByWineID.php" method="post">

    <h3>Search for Wine in Storage</h3>

    <!-- Selection dropdown -->
    <?php 
    $conn = OpenCon();
    $result = $conn->query("select WineID from StoredIn");

    echo "<select name='name'>";
    echo '<option value="">---Select name---</option>';
    while ($row = $result->fetch_assoc()) {
        unset($name);
        $name = $row['name'];
        echo '<option value="'.$name.'">'.$name.'</option>';
    }

    echo "</select></p>";
    CloseCon($conn);
    ?>
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
