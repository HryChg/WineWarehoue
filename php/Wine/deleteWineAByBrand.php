<form action="process-deleteWineAByBrand.php" method="post">

    Delete a tuple from WineA using brandName

    </br>

    </br>

    <label>WineA BrandName</label>

    <?php

    // include '../../connect.php'; 
    $conn = OpenCon();

    $result = $conn->query("select brandName from WineA");

    echo "<select name='brandName'>";

    while ($row = $result->fetch_assoc())
    {
        unset($brandName);

        $brandName = $row['brandName'];

        echo '<option value="'.$brandName.'">'.'BrandName: '.$brandName.'</option>';

        // use '.' to append string
    }

    echo "</select>";


    ?>


    <input type="submit" value="Delete">

</form>