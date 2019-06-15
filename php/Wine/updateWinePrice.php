<script src="./../../php/Wine/update-submit.js"></script>
<form class="ui form" id="update-wine" url="../../php/Wine/process-updateWinePrice.php" method="post">

    <h3>Update Wine Price</h3>

    <?php

    include_once '../../connect.php'; 
    $conn = OpenCon();

    $result = $conn->query("select wineID from WineB");

    echo "<div class='field'>
        <label>Wine</label>
        <select name='wineID'>";
    echo '<option value="">---Select wineID---</option>';
    while ($row = $result->fetch_assoc())
    {
        unset($wineID);
        $wineID = $row['wineID'];
        echo '<option value="'.$wineID.'">'.$wineID.'</option>';
    }

    echo "</select></div>";
    CloseCon($conn);
    ?>

    <div class='field'>
        <label>Wine Price </label>
        <input name="price" type="text" placeholder="Enter new price for wine">
    </div>

    <input class="ui positive button update-wine" type="submit" value="Update">

</form>