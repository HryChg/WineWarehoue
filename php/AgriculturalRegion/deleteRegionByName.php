<form class="ui form" action="../../php/AgriculturalRegion/process-deleteRegionByName.php" method="post">

   <h3>Delete an Agricultural Region</h3>

    <label>Agricultural Region</label>

    <?php

    // include '../../connect.php'; 
    $conn = OpenCon();

    $result = $conn->query("select name from AgriculturalRegion");

    echo "<p><select name='name'>";

    while ($row = $result->fetch_assoc())

    {

        unset($name);

        $name = $row['name'];

        echo '<option value="'.$name.'">'.'Name: '.$name.'</option>';

    }

    echo "</select></p>";

    ?>

    <input class="ui button" type="submit" value="Delete">

</form>