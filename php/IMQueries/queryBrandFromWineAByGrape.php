<form class="ui form" action="../../php/IMQueries/process-queryBrandFromWineAByGrape.php" method="post">

    <h3>Search for Wine by Grape Type</h3>

    <?php

    include_once '../../connect.php';
    $conn = OpenCon();

    echo "<div class='field'>
        <label>GrapeType</label>
        <select name='grapeType'>";
    echo '<option value="">---Select grapeType---</option>';
    $result = $conn->query("SELECT grapeType1 AS grapeType from WineA UNION SELECT grapeType2 AS grapeType from WineA");
    while ($row = $result->fetch_assoc())
    {
        unset($grapeType);
        $grapeType = $row['grapeType'];
        echo '<option value="'.$grapeType.'">'.$grapeType.'</option>';
    }
    
    echo "</select></div>";

    CloseCon($conn);
    ?>

    <input class="ui secondary button" type="submit" value="Query">

</form>