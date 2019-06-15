<form class="ui form" action="../../php/IMQueries/process-queryWineByAgriAttribute.php" method="post">

    <h3>Search Wine By Agricultural Region Attribute</h3>

    <label>Agricultural Region Attribute: </label>

    <?php

    include_once '../../connect.php'; 
    $conn = OpenCon();

    $agriRegionAttrArray = array();
    array_push($agriRegionAttrArray, '---Select Agricultural Region Attribute---');
    array_push($agriRegionAttrArray, 'climate');
    array_push($agriRegionAttrArray, 'moisture');
    array_push($agriRegionAttrArray, 'temperature');

    echo "<p><select name='attribute'>";
    foreach($agriRegionAttrArray as $agriRegionAtt) {
        echo '<option value="'.$agriRegionAtt.'">'.$agriRegionAtt.'</option>';
    }
    echo "</select></p>";
    CloseCon($conn);
    ?>
    <p>
        <label> Value: </label>
        <input type="text" name="val">
    </p>
    <input class="ui secondary button" type="submit" value="Query">

</form>