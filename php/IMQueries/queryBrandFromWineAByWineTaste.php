<form class="ui form" action="../../php/IMQueries/process-queryBrandFromWineAByWineTaste.php" method="post">

    <h3>Query WineA by WineTaste1 or WineTaste2</h3>

    <label>WineTaste</label>

    <?php

    //include '../../connect.php'; $conn = OpenCon();

    $result1 = $conn->query("select wineTaste1 from WineA");
    $wineTaste1Array = array();
    while ($row = $result1->fetch_assoc()) {
        unset($wineTaste1);
        $wineTaste1 = $row['wineTaste1'];
        array_push($wineTaste1Array, $wineTaste1);
    }
    $result2 = $conn->query("select wineTaste2 from WineA");
    $wineTaste2Array = array();
    while ($row = $result2->fetch_assoc()) {
        unset($wineTaste2);
        $wineTaste2 = $row['wineTaste2'];
        array_push($wineTaste2Array, $wineTaste2);
    }
    $combinedArray = array_unique(array_merge($wineTaste1Array, $wineTaste2Array));

    echo "<p><select name='wineTaste'>";
    foreach($combinedArray as $wineTaste) {
        echo '<option value="'.$wineTaste.'">'.'WineTaste: '.$wineTaste.'</option>';
    }
    echo "</select></p>";

    ?>

    <input class="ui button" type="submit" value="Query">

</form>