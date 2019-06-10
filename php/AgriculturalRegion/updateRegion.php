<form class="ui form" action="../../php/AgriculturalRegion/process-updateRegion.php" method="post">

    <h3>Update Agricultural Region</h3>

    <label>Agricultural Region</label>

    <?php

    include_once '../../connect.php'; 
    $conn = OpenCon();
    $result = $conn->query("select name from AgriculturalRegion");

    echo "<p><select name='name'>";
    echo '<option value="">---Select name---</option>';
    while ($row = $result->fetch_assoc()) {
        unset($name);
        $name = $row['name'];
        echo '<option value="'.$name.'">'.$name.'</option>';
    }
    echo "</select></p>";
    ?>
    <p>
        <label>Temperature </label>
        <input name="temperature" type="text" placeholder="Enter new temperature">
    </p>
    <p>
        <label>Moisture </label>
        <input name="moisture" type="text" placeholder="Enter new moisture">
    </p>
    <p>
        <label>Climate </label>
        <input name="climate" type="text" placeholder="Enter new climate">
    </p>
    <input class="ui button" type="submit" value="Update">

</form>