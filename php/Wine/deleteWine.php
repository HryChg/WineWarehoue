<script src="./../../php/Wine/delete-wine.js"></script>
<form class="ui form" id="delete-wine" url="../../php/Wine/process-deleteWine.php" method="post">

    <h3>Delete Wine</h3>

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

    <input class="ui red button delete-wine" type="submit" value="Delete">

</form>