<form action="process-deleteWineOrigin.php" method="post">

    Delete a tuple from WineOrigin using regionName and wineID

    </br>

    </br>

    <label>Wine Origin</label>

    <?php

    include '../../connect.php'; $conn = OpenCon();

    $result = $conn->query("select regionName, wineID from AgriculturalRegion");

    echo "<select name='name'>";

    while ($row = $result->fetch_assoc())

    {

        unset($name);

        $name = $row['name'];

        echo '<option value="'.$name.'">'.'Name: '.$name.'</option>';
        // use '.' to append string

    }

    echo "</select>";

    ?>


    <input type="submit" value="Delete">

</form>