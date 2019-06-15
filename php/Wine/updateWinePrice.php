<script src="./../../php/Wine/update-submit.js"></script>
<form class="ui form" id="update-wine" url="../../php/Wine/process-updateWinePrice.php" method="post">

    <h3>Update Wine Price</h3>

    <label>Wine</label>

    <?php

    include_once '../../connect.php'; 
    $conn = OpenCon();

    $result = $conn->query("select wineID from WineB");

    echo "<p><select name='wineID'>";
    echo '<option value="">---Select wineID---</option>';
    while ($row = $result->fetch_assoc())
    {
        unset($wineID);
        $wineID = $row['wineID'];
        echo '<option value="'.$wineID.'">'.$wineID.'</option>';
    }

    echo "</select></p>";
    CloseCon($conn);
    ?>

    <p>
        <label>Wine Price </label>
        <input name="price" type="text" placeholder="Enter new price for wine">
    <p>

    <input class="ui positive button update-wine" type="submit" value="Update">

</form>