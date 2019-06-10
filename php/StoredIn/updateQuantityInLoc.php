<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="./../../util/submitForm.js"></script>
<form class="ui form" url="./../../php/StoredIn/process-updateQuantityInLoc.php" method="post">

    <h3>Update Wine Quantity in Storage</h3>
    <p>
    <label>Location and WineID</label>

    <?php

    // include '../../connect.php'; 
    $conn = OpenCon();

    $result = $conn->query("select locationID, wineID from StoredIn");

    echo "<select name='keys'>";

    while ($row = $result->fetch_assoc())
    {
        unset($locationID, $wineID);

        $locationID = $row['locationID'];
        $wineID = $row['wineID'];

        echo '<option value="'.$locationID.','.$wineID.'">'.'LocationID: '.$locationID.', WineID: '.$wineID.'</option>';

        // use '.' to append string
    }

    echo "</select></p>";


    ?>

    <p>
    <label>New Quantity</label>

    <input name="quantityInLocation" type="text" placeholder="Enter new quantity">
    </p>
    <input class="ui button submit-form" type="submit" value="Update">

</form>
<script>
$(document).ready(function() {
    $(".submit-form").click(function(e) {
        $("#storedin-table").load('../../php/StoredIn/defaultView-storedin.php');
    });
});
</script>