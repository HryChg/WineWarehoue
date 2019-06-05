<form action="process-deleteWineBByBrandOrID.php" method="post">

    Delete a tuple from WineB using brandName or wineID

    </br>

    </br>

    <label>WineB BrandName and WineID</label>

    <?php

    include '../../connect.php'; $conn = OpenCon();

    $result1 = $conn->query("select brandName from WineB");

    echo "<select name='brandName'>";

    echo '<option value="">---Select brandName---</option>';
    while ($row = $result1->fetch_assoc())
    {
        unset($brandName);
        $brandName = $row['brandName'];
        echo '<option value="'.$brandName.'">'.'BrandName: '.$brandName.'</option>';
    }

    echo "</select>";

    $result2 = $conn->query("select wineID from WineB");

    echo "<select name='wineID'>";
    echo '<option value="">---Select wineID---</option>';
    while ($row = $result2->fetch_assoc())
    {
        unset($wineID);
        $wineID = $row['wineID'];
        echo '<option value="'.$wineID.'">'.'WineID: '.$wineID.'</option>';
    }

    echo "</select>";


    ?>

    <input type="submit" value="Delete">

</form>