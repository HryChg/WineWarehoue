<script src="./../../php/Wine/delete-submit-brandname.js"></script>
<form class="ui form" id="delete-wine-brandname" url="../../php/Wine/process-deleteWineByBrand.php" method="post">

    <h3>Delete BrandName</h3>

    <label>BrandName</label>

    <?php

    include_once '../../connect.php'; 
    $conn = OpenCon();

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
    CloseCon($conn);
    ?>

    <input class="ui button delete-wine-brandname" type="submit" value="Delete">

</form>