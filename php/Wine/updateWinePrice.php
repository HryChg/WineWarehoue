<form class="ui form" action="../../php/Wine/process-updateWinePrice.php" method="post">

    <h3>Update the price of a wineB</h3>

    <label>Wine</label>

    <?php

    // include '../../connect.php'; 
    $conn = OpenCon();

    $result = $conn->query("select wineID from WineB");

    echo "<p><select name='wineID'>";
    echo '<option value="">---Select wineID---</option>';
    while ($row = $result->fetch_assoc())

    {

        unset($wineID);

        $wineID = $row['wineID'];

        echo '<option value="'.$wineID.'">'.$wineID.'</option>';
        // use '.' to append string

    }

    echo "</select></p>";
    CloseCon($conn);
    ?>

    <p>
        <label>Wine Price </label>
        <input name="price" type="text" placeholder="Enter new price for wine">
    <p>

    <input class="ui button" type="submit" value="Update">

</form>