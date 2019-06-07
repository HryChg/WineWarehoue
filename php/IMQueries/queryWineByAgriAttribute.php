<form action="process-queryWineByAgriAttribute.php" method="post">

    Query Wine By Agricultural Region Attribute

    </br>

    <label>Agricultural Region Attribute (temperature or moisture or climate): </label>

    <?php

    include '../../connect.php'; $conn = OpenCon();

    $agriRegionAttrArray = array();
    array_push($agriRegionAttrArray, 'temperature');
    array_push($agriRegionAttrArray, 'moisture');
    array_push($agriRegionAttrArray, 'climate');

    echo "<select name='attribute'>";
    foreach($agriRegionAttrArray as $agriRegionAtt) {
        echo '<option value="'.$agriRegionAtt.'">'.'Agricultural Region Attribute: '.$agriRegionAtt.'</option>';
    }
    echo "</select>";
    ?>

    <label> value: </label>
    <input type="text" name="val">

    <input type="submit" value="Query">

</form>