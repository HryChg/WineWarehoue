<script src="./../../php/Wine/delete-wine.js"></script>
<form class="ui form" id="delete-wine" url="../../php/Wine/process-deleteWine.php" method="post">

    <h3>Delete Wine</h3>
    <p>The following wines <b>cannot</b> be deleted:
        <br/>
        - Wines referenced in orders
        <br/>
        - Wines in stock</p>
    <p>Choose <b>one</b> of the following:</p>
    <?php

    include_once '../../connect.php'; 
    $conn = OpenCon();

    // Delete Wine by BrandName
    $result = $conn->query("SELECT brandName from WineA
                            UNION
                            SELECT brandName from WineB
                            ORDER BY brandName");

    echo "<div class='field'>
        <label>BrandName</label>
        <select name='brandName'>";
    echo '<option value="">---Select brandName---</option>';
    while ($row = $result->fetch_assoc())
    {
        unset($brandName);
        $brandName = $row['brandName'];
        echo '<option value="'.$brandName.'">'.$brandName.'</option>';
    }
    echo "</select></div>";

    // Delete Wine by WineID
    $sql = "SELECT wineID FROM WineB WHERE wineID not in (SELECT wineID from OrderForWine)
                                       AND wineID not in (SELECT wineID from StoredIn)";
    $result = $conn->query($sql);
    echo "<div class='field'>
        <label>WineID</label>
        <select name='wineID'>";
    echo '<option value="">---Select wineID---</option>';
    while ($row = $result->fetch_assoc())
    {
        unset($wineID);
        $wineID = $row['wineID'];
        echo '<option value="'.$wineID.'">'.$wineID.'</option>';
    }
    echo "</select></div>";

    // Delete Wine by WineOrigin
    $result = $conn->query("SELECT DISTINCT regionName From wineorigin 
                            where wineID not in
                            (SELECT s.wineID
                            from storedin s)
                            and wineID not in
                            (SELECT o.wineID
                            from orderforwine o)");
    echo "<div class='field'><label>WineOrigin</label>";
    echo "<select name='regionName'>";
    echo '<option value="">---Select WineOrigin---</option>';
    while ($row = $result->fetch_assoc())
    {
        unset($regionName);
        $regionName = $row['regionName'];
        echo '<option value="'.$regionName.'">'.$regionName.'</option>';
    }
    echo "</select></div>";

    CloseCon($conn);
    ?>

    <input class="ui red button delete-wine" type="submit" value="Delete">

</form>