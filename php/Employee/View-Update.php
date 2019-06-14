<?php
function displayEmployeeOption()
{
    $conn = OpenCon();
    $result = $conn->query("SELECT employeeID, name From Employee");
    echo "<select name='employeeID' class='ui dropdown'>";
    while ($row = $result->fetch_assoc()) {
        unset($employeeID, $name);
        $employeeID = $row['employeeID'];
        $name = $row['name'];
        echo '<option value="' . $employeeID . '">' . 'EmployeeID: ' . $employeeID . ' ' . 'Name: ' . $name . '</option>';
    }
    echo "</select>";
    CloseCon($conn);
}

function displayEmployeeAttributes()
{
    $conn = OpenCon();
    $result = $conn->query("SHOW COLUMNS FROM Employee");
    if (!$result) {
        echo 'Could not show columns from Employees';
        exit;
    }
    echo "<select name='column' class='ui dropdown'>";
    while ($row = $result->fetch_assoc()) {
        unset($type);
        $type = $row['Field'];
        if ($type == 'employeeID') continue;
        echo '<option value="' . $type . '">' . $type . '</option>';
    }
    echo "</select>";
    CloseCon($conn);
}

?>


<div class="ui form card container">
    <form action="../../php/Employee/Process-Update.php" method="post">
        <h4 class="ui header"> Select the name of an employee </h4>
        <div class="field">
            <?php displayEmployeeOption() ?>
            <label>Employee</label>
        </div>
        <div class="field">
            <? displayEmployeeAttributes() ?>
            <label>Choose the attribute to update</label>
        </div>

        <div class="field">
            <input name="value" type="text" placeholder="Enter new value">
            <label>Enter New Value</label>
        </div>
        <input class="positive ui button" type="submit" value="Update">

    </form>
</div>