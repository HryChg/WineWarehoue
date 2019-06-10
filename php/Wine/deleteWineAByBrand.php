<form class="ui form" action="../../php/Wine/process-deleteWineAByBrand.php" method="post">

    <h3>Delete a tuple from WineA using brandName</h3>

    <label>WineA BrandName</label>

    <?php

    // include '../../connect.php'; 
    $conn = OpenCon();

    $result = $conn->query("select brandName from WineA");

    echo "<p><select name='brandName'>";

    while ($row = $result->fetch_assoc())
    {
        unset($brandName);

        $brandName = $row['brandName'];

        echo '<option value="'.$brandName.'">'.'BrandName: '.$brandName.'</option>';

    }

    echo "</select></p>";

    ?>

    <input class="ui button" type="submit" value="Delete">

</form>