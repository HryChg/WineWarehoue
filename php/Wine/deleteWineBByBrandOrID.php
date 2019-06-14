<script src="./../../php/Wine/delete-submit-wineid.js"></script>
<form class="ui form" id="delete-wine-wineid" url="../../php/Wine/process-deleteWineBByBrandOrID.php" method="post">

    <h3>Delete BrandName (WineB) or WineID</h3>
    <!-- TODO: Fix Bug - no update -->
    <label>WineB BrandName</label>
    
    <?php

    include_once '../../connect.php'; 
    $conn = OpenCon();

    $result1 = $conn->query("select brandName from WineB");

    echo "<p><select name='brandName'>";

    echo '<option value="">---Select brandName---</option>';
    while ($row = $result1->fetch_assoc())
    {
        unset($brandName);
        $brandName = $row['brandName'];
        echo '<option value="'.$brandName.'">'.'BrandName: '.$brandName.'</option>';
    }
    echo "</select></p>";

    $result2 = $conn->query("select wineID from WineB");
    echo "<label>WineID</label>";
    echo "<p><select name='wineID'>";
    echo '<option value="">---Select wineID---</option>';
    while ($row = $result2->fetch_assoc())
    {
        unset($wineID);
        $wineID = $row['wineID'];
        echo '<option value="'.$wineID.'">'.'WineID: '.$wineID.'</option>';
    }

    echo "</select></p>";
    CloseCon($conn);
    ?>

    <input class="ui button delete-wine-wineid" type="submit" value="Delete">

</form>