<script src="./../../php/AgriculturalRegion/delete-submit-ar.js"></script>
<form class="ui form" id="delete-ar" url="../../php/AgriculturalRegion/process-deleteRegionByName.php" method="post">

   <h3>Delete Agricultural Region</h3>

    <label>Agricultural Region</label>

    <?php

    include_once '../../connect.php'; 
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

    <input class="ui red button delete-ar" type="submit" value="Delete">

</form>