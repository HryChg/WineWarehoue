<form class="ui form" action="../../php/IMQueries/process-queryWineByAgriAttribute.php" method="post">

    <h3>Search Wine By Agricultural Region Attribute</h3>

    <?php

    include_once '../../connect.php'; 
    $conn = OpenCon();

    $agriRegionAttrArray = array();
    array_push($agriRegionAttrArray, '---Select Agricultural Region Attribute---');
    array_push($agriRegionAttrArray, 'climate');
    array_push($agriRegionAttrArray, 'moisture');
    array_push($agriRegionAttrArray, 'temperature');

    echo "<div class='field'>
        <label>Agricultural Region Attribute </label>
        <select name='attribute'>";
    foreach($agriRegionAttrArray as $agriRegionAtt) {
        echo '<option value="'.$agriRegionAtt.'">'.$agriRegionAtt.'</option>';
    }
    echo "</select></div>";
    CloseCon($conn);
    ?>
    <div class='field'>
        <label> Value </label>
        <input type="text" name="val">
    </div>
    <input class="ui secondary button" type="submit" value="Query">

</form>