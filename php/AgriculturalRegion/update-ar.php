<script src="./../../php/AgriculturalRegion/update-ar.js"></script>
<form class="ui form" id="update-ar" url="../../php/AgriculturalRegion/process-update-ar.php" method="post">

    <h3>Update Agricultural Region</h3>

    <?php
    include_once '../../connect.php'; 
    $conn = OpenCon();

    $result = $conn->query("select name from AgriculturalRegion");

    echo "<div class='field'>
        <label>Agricultural Region</label>
        <select name='name'>";
    echo '<option value="">---Select name---</option>';
    while ($row = $result->fetch_assoc()) {
        unset($name);
        $name = $row['name'];
        echo '<option value="'.$name.'">'.$name.'</option>';
    }
    echo "</select></div>";
    CloseCon($conn);
    ?>
    <div class='field'>
        <label>Temperature </label>
        <input name="temperature" type="text" placeholder="Enter new temperature">
    </div>
    <div class='field'>
        <label>Moisture </label>
        <input name="moisture" type="text" placeholder="Enter new moisture">
    </div>
    <div class='field'>
        <label>Climate </label>
        <input name="climate" type="text" placeholder="Enter new climate">
    </div>
    <input class="ui positive button update-ar" type="submit" value="Update">

</form>