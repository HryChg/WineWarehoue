<script src="./../../php/Wine/delete-wine.js"></script>
<form class="ui form" id="delete-wine" url="../../php/Wine/process-deleteWine.php" method="post">

    <h3>Delete Wines</h3>

    <label>BrandName</label>

    <?php

    include_once '../../connect.php'; 
    $conn = OpenCon();

    // Delete Wine by BrandName
    $result = $conn->query("SELECT brandName from WineA
                            UNION
                            SELECT brandName from WineB
                            ORDER BY brandName");

    echo "<p><select name='brandName'>";
    echo '<option value="">---Select brandName---</option>';
    while ($row = $result->fetch_assoc())
    {
        unset($brandName);
        $brandName = $row['brandName'];
        echo '<option value="'.$brandName.'">'.$brandName.'</option>';
    }
    echo "</select></p>";

    echo "or";

    // Delete Wine by WineID
    $result = $conn->query("select wineID from WineB");
    echo "<p>
        <label>WineID</label>
        <select name='wineID'>";
    echo '<option value="">---Select wineID---</option>';
    while ($row = $result->fetch_assoc())
    {
        unset($wineID);
        $wineID = $row['wineID'];
        echo '<option value="'.$wineID.'">'.$wineID.'</option>';
    }
    echo "</select></p>";

    echo "or";

    // Delete Wine by WineOrigin
    $result = $conn->query("SELECT DISTINCT regionName from WineOrigin");
    echo "<p><label>WineOrigin</label>";
    echo "<select name='regionName'>";
    echo '<option value="">---Select WineOrigin---</option>';
    while ($row = $result->fetch_assoc())
    {
        unset($regionName);
        $regionName = $row['regionName'];
        echo '<option value="'.$regionName.'">'.$regionName.'</option>';
    }
    echo "</select></p>";

    CloseCon($conn);
    ?>

    <input class="ui red button delete-wine" type="submit" value="Delete">

</form>