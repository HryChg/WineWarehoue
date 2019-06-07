<form action="process-queryBrandFromWineAByGrape.php" method="post">

    Query WineA by grapeType1 or grapeType2

    </br>

    </br>

    <label>grapeType</label>

    <?php

    //include '../../connect.php'; $conn = OpenCon();

    $result1 = $conn->query("select grapeType1 from WineA");
    $grapeType1Array = array();
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
        echo '<option value="'.$grapeType.'">'.'grapeType: '.$grapeType.'</option>';
    }
    echo "</select>";

    ?>

    <input type="submit" value="Query">

</form>