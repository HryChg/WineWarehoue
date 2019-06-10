<form class="ui form" action="../../php/IMQueries/process-queryWineByAgriAttribute.php" method="post">

    <h3>Query Wine By Agricultural Region Attribute</h3>

    <label>Agricultural Region Attribute (temperature or moisture or climate): </label>

    <?php

    //include '../../connect.php'; $conn = OpenCon();

    $agriRegionAttrArray = array();
    array_push($agriRegionAttrArray, '---Select Agricultural Region Attribute---');
    array_push($agriRegionAttrArray, 'temperature');
    array_push($agriRegionAttrArray, 'moisture');

    echo "<p><select name='attribute'>";
    foreach($agriRegionAttrArray as $agriRegionAtt) {
        echo '<option value="'.$agriRegionAtt.'">'.'Agricultural Region Attribute: '.$agriRegionAtt.'</option>';
    }
    echo "</select></p>";
    ?>
    <p>
        <label> value: </label>
        <input type="text" name="val">
    </p>
    <input class="ui button" type="submit" value="Query">

</form>