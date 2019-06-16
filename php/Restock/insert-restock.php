<script src="./../../php/Restock/insert-restock.js"></script>
<form class="ui form" id="restock-form" method="post" url="./../../php/Restock/process-insert-restock.php">
    <h3>Add Wine Restock Records</h3>
    <div class='field'>
        <label>Employee ID:</label>
        <!-- <input type="text" name="employeeid" id="employeeid"> -->
        <?php
        include_once '../../connect.php'; 
        $conn = OpenCon();
        $result = $conn->query("SELECT employeeid from Employee ORDER BY employeeid");
        echo "<select name='employeeid'>";
        echo '<option value="">---Select employeeID---</option>';
        while ($row = $result->fetch_assoc()) {
            unset($employeeid);
            $employeeid = $row['employeeid'];
            echo '<option value="'.$employeeid.'">'.$employeeid.'</option>';
        }
        echo "</select>";
        ?>
    </div>
    <div class='field'>
        <label>Supplier ID:</label>
        <!-- <input type="text" name="supplierid" id="supplierid"> -->
        <?php
        $result = $conn->query("SELECT supplierid from SupplierB ORDER BY supplierid");
        echo "<select name='supplierid'>";
        echo '<option value="">---Select supplierID---</option>';
        while ($row = $result->fetch_assoc()) {
            unset($supplierid);
            $supplierid = $row['supplierid'];
            echo '<option value="'.$supplierid.'">'.$supplierid.'</option>';
        }
        echo "</select>";
        ?>
    </div>
    <div class='field'>
        <label>Wine ID:</label>
        <!-- <input type="text" name="wineid" id="wineid"> -->
        <?php
        $result = $conn->query("SELECT wineid from WineB ORDER BY wineid");
        echo "<select name='wineid'>";
        echo '<option value="">---Select wineID---</option>';
        while ($row = $result->fetch_assoc()) {
            unset($wineid);
            $wineid = $row['wineid'];
            echo '<option value="'.$wineid.'">'.$wineid.'</option>';
        }
        echo "</select>";
        ?>
    </div>
    <div class='field'>
        <label>Location:</label>
        <!-- <input type="text" name="locationID" id="locationID"> -->
        <?php
        $result = $conn->query("SELECT locationID from StorageArea ORDER BY locationID");
        echo "<select name='locationID'>";
        echo '<option value="">---Select locationID---</option>';
        while ($row = $result->fetch_assoc()) {
            unset($locationID);
            $locationID = $row['locationID'];
            echo '<option value="'.$locationID.'">'.$locationID.'</option>';
        }
        echo "</select>";
        ?>
    </div>
    <div class='field'>
        <label>Quantity:</label>
        <input type="text" name="quantity" id="quantity">
    </div>
    <div class='field'>
        <label>Restock Date (YYYY-MM-DD):</label>
        <input type="text" name="date" id="date">
    </div>
    <input class="ui button primary restock-form" type="submit" value="Add">
</form>

<?php 
CloseCon($conn);
?>