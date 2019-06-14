<form class="ui form" action="../../php/IMQueries/process-queryBrandFromWineAByGrape.php" method="post">

    <h3>Search for Wine by Grape Type</h3>
    <label>GrapeType</label>

    <?php

    //include_once '../../connect.php';
    $conn = OpenCon();

    $result1 = $conn->query("select grapeType1 from WineA");
    $grapeType1Array = array();
    array_push($grapeType1Array, "---Select grape type---");
    while ($row = $result1->fetch_assoc()) {
        unset($grapeType1);
        $grapeType1 = $row['grapeType1'];
        array_push($grapeType1Array, $grapeType1);
    }
    $result2 = $conn->query("select grapeType2 from WineA");
    $grapeType2Array = array();
    while ($row = $result2->fetch_assoc()) {
        unset($grapeType2);
        $grapeType2 = $row['grapeType2'];
        array_push($grapeType2Array, $grapeType2);
    }
    $combinedArray = array_unique(array_merge($grapeType1Array, $grapeType2Array));

    echo "<select name='grapeType'>";
    foreach($combinedArray as $grapeType) {
        echo '<option value="'.$grapeType.'">'.$grapeType.'</option>';
    }
    echo "</select>";

    CloseCon($conn);
    ?>

    <input class="ui button" type="submit" value="Query">

</form>