<script src="./../../php/Wine/delete-submit-wineid.js"></script>
<form class="ui form" id="delete-wine-wineid" url="../../php/Wine/process-deleteWineByID.php" method="post">

    <h3>Delete WineID</h3>
    <!-- TODO: Fix Bug - no update possibly because of foreign key -->
    
    <?php

    include_once '../../connect.php'; 
    $conn = OpenCon();

    $result = $conn->query("select wineID from WineB");
    echo "<label>WineID</label>";
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

    <input class="ui red button delete-wine-wineid" type="submit" value="Delete">

</form>