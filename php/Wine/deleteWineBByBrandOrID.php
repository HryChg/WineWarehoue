<form class="ui form" action="../../php/Wine/process-deleteWineBByBrandOrID.php" method="post">

    <h3>Delete a tuple from WineB using brandName or wineID</h3>

    <label>WineB BrandName and WineID</label>

    <?php

    // include '../../connect.php'; 
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

    <input class="ui button" type="submit" value="Delete">

</form>