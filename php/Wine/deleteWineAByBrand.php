<script src="./../../php/Wine/delete-submit-brandname.js"></script>
<form class="ui form" id="delete-wine-brandname" url="../../php/Wine/process-deleteWineAByBrand.php" method="post">

    <h3>Delete BrandName (WineA)</h3>
    <!-- TODO: Merge this with Delete BrandName (WineB) -->

    <label>BrandName</label>

    <?php

    include_once '../../connect.php'; 
    $conn = OpenCon();

    $result = $conn->query("select brandName from WineA ORDER BY brandName");

    echo "<p><select name='brandName'>";
    echo '<option value="">---Select brandName---</option>';
    while ($row = $result->fetch_assoc())
    {
        unset($brandName);

        $brandName = $row['brandName'];

        echo '<option value="'.$brandName.'">'.$brandName.'</option>';

    }

    echo "</select></p>";
    CloseCon($conn);
    ?>

    <input class="ui button delete-wine-brandname" type="submit" value="Delete">

</form>