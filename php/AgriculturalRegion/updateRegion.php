<form class="ui form" action="../../php/AgriculturalRegion/process-updateRegion.php" method="post">

    <h3>Update the temperature of a AgriculturalRegion</h3>
    
    
    <p>
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

    }

    echo "</select></p>";

    ?>
    <p>
        <label>Temperature </label>
        <input name="temperature" type="text" placeholder="Enter new temp for region">
    </p>
    <p>
        <label>Moisture </label>
        <input name="moisture" type="text" placeholder="Enter new moisture for region">
    </p>
    <p>
        <label>Climate </label>
        <input name="climate" type="text" placeholder="Enter new climate for region">
    </p>
    <input class="ui button" type="submit" value="Update">

</form>