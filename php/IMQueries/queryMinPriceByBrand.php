<?php
include_once '../../connect.php'; 
$conn = OpenCon();
?>

<form class="ui form" action="../../php/IMQueries/process-queryMinPriceByBrand.php" method="post">

    <h3>Search Wine Brand and Minimum Price</h3>

    <div class="field">
        <label>Wine Brand</label>
        
        <?php
        $result = $conn->query("SELECT DISTINCT brandName from WineB
                                ORDER BY brandName");

        echo "<select name='brandName'>";
        echo '<option value="">---Select brandName---</option>';
        while ($row = $result->fetch_assoc())
        {
            unset($brandName);
            $brandName = $row['brandName'];
            echo '<option value="'.$brandName.'">'.$brandName.'</option>';
        }
        echo "</select>";
        ?>
    </div>

    <input class="ui secondary button" type="submit" value="Query">

</form>

<?php
CloseCon($conn);
?>