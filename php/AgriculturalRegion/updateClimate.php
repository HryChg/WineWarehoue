<form class="ui form" action="../../php/AgriculturalRegion/process-updateClimate.php" method="post">

    Update the climate of a AgriculturalRegion

    </br>

    </br>

    <label>AgriculturalRegion</label>

    <?php

    // include '../../connect.php';
    $conn = OpenCon();

    $result = $conn->query("select name from AgriculturalRegion");

    echo "<select name='name'>";

    while ($row = $result->fetch_assoc())

    {

        unset($name);

        $name = $row['name'];

        echo '<option value="'.$name.'">'.'Region Name: '.$name.'</option>';
        // use '.' to append string

    }

    echo "</select>";

    ?>

    <br>



    <label>Region climate </label>

    <input name="climate" type="text" placeholder="Enter new climate for region">


    <input type="submit" value="Update">

</form>