<!-- Query WineA by WineTaste1 or WineTaste2 -->
<form class="ui form" action="../../php/IMQueries/process-queryBrandFromWineAByWineTaste.php" method="post">
    
    <h3>Search for Wine By Taste</h3>
    
    <?php

    include_once '../../connect.php';
    $conn = OpenCon();

    echo "<p>
        <label>WineTaste</label>
        <select name='wineTaste'>";
    echo '<option value="">---Select wineTaste---</option>';
    $result = $conn->query("SELECT wineTaste1 AS wineTaste from WineA UNION SELECT wineTaste2 AS wineTaste from WineA");
    while ($row = $result->fetch_assoc())
    {
        unset($wineTaste);
        $wineTaste = $row['wineTaste'];
        echo '<option value="'.$wineTaste.'">'.$wineTaste.'</option>';
    }
    
    echo "</select></p>";

    CloseCon($conn);
    ?>

    <input class="ui secondary button" type="submit" value="Query">

</form>