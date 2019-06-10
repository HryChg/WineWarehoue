<form class="ui form" action="../../php/AgriculturalRegion/process-updateRegionTemp.php" method="post">

    <h3>Update the temperature of a AgriculturalRegion</h3>

    <label>AgriculturalRegion</label>

    <?php

    // include '../../connect.php'; 
    $conn = OpenCon();

    $result = $conn->query("select name from AgriculturalRegion");

    echo "<p><select name='name'>";

    while ($row = $result->fetch_assoc())

    {

        unset($name);

        $name = $row['name'];

        echo '<option value="'.$name.'">'.'Region Name: '.$name.'</option>';
        // use '.' to append string

    }

    echo "</select></p>";

    ?>
    <p>
        <label>Region Temperature </label>
        <input name="temperature" type="text" placeholder="Enter new temp for region">
    </p>

    <input class="ui button" type="submit" value="Update">

</form>