<form class="ui form" action="../../php/AgriculturalRegion/process-deleteRegionByName.php" method="post">

   Delete a tuple from AgriculturalRegion using name

    </br>

    </br>

    <label>Agricultural Region</label>

    <?php

    // include '../../connect.php'; 
    $conn = OpenCon();

    $result = $conn->query("select name from AgriculturalRegion");

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