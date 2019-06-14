<script src="./../../php/AgriculturalRegion/update-submit.js"></script>
<form class="ui form" id="update-ar" method="post" url="../../php/AgriculturalRegion/process-update.php">

    <h3>Update Agricultural Region</h3>
    <!-- TODO: This has a bug -- not sure where as not updating upon submit - might be async -->
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
    CloseCon($conn);
    ?>
    <p>
        <label for="temperature">Temperature </label>
        <input name="temperature" type="text" placeholder="Enter new temperature">
    </p>
    <p>
        <label for="moisture">Moisture </label>
        <input name="moisture" type="text" placeholder="Enter new moisture">
    </p>
    <p>
        <label for="climate">Climate </label>
        <input name="climate" type="text" placeholder="Enter new climate">
    </p>
    <input class="ui button update-ar" type="submit" value="Update">

</form>