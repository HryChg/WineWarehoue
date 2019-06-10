<form class="ui form" action="../../php/AgriculturalRegion/process-updateClimate.php" method="post">

    <h3>Update the climate of a AgriculturalRegion</h3>

    <label>AgriculturalRegion</label>

    <?php

    include_once '../../connect.php';
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
    CloseCon($conn);
    ?>
    <p>
        <label>Region climate </label>
        <input name="climate" type="text" placeholder="Enter new climate for region">
    </p>

    <input class="ui button" type="submit" value="Update">

</form>