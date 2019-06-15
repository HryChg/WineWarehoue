<form class="ui form" action="../../php/IMQueries/process-queryPriceFromWineBByID.php" method="post">

    <h3>Search for Wine Price</h3>
    <?php

    include_once '../../connect.php'; 
    $conn = OpenCon();

    $result = $conn->query("select wineID from WineB");

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
    CloseCon($conn);
    ?>

    <input class="ui secondary button" type="submit" value="Query">

</form>