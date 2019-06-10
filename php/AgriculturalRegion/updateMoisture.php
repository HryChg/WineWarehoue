<form class="ui form" action="../../php/AgriculturalRegion/process-updateMoisture.php" method="post">

    <h3>Update the moisture of a AgriculturalRegion</h3>

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

    }

    echo "</select></p>";
    CloseCon($conn);
    ?>

    <p>
        <label>Region Moisture </label>
        <input name="moisture" type="text" placeholder="Enter new moisture for region">
    </p>

    <input class="ui button" type="submit" value="Update">

</form>