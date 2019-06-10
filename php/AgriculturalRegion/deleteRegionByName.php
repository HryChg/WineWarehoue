<form class="ui form" action="../../php/AgriculturalRegion/process-deleteRegionByName.php" method="post">

   <h3>Delete an Agricultural Region</h3>

    <label>Agricultural Region</label>

    <?php

    // include '../../connect.php'; 
    $conn = OpenCon();

    $result = $conn->query("select name from AgriculturalRegion");

    echo "<p><select name='name'>";
    echo '<option value="">---Select name---</option>';
    while ($row = $result->fetch_assoc())

    {

        unset($name);

        $name = $row['name'];

        echo '<option value="'.$name.'">'.$name.'</option>';

    }

    echo "</select></p>";
    CloseCon($conn);
    ?>

    <input class="ui button" type="submit" value="Delete">

</form>