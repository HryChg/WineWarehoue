<?php
include_once '../../connect.php';

function displayEmployeeOption()
{

    $conn = OpenCon();
    $result = $conn->query("SELECT employeeID, name, type From Employee");

    echo "<select name='keys' class='ui dropdown'>";
    while ($row = $result->fetch_assoc()) {

        unset($employeeID, $name, $type);
        $employeeID = $row['employeeID'];
        $name = $row['name'];
        $type = $row['type'];

        echo '<option value="' . $employeeID . ','.$type.'">' . 'EmployeeID: ' . $employeeID . ' ' . 'Name: '.$name.' Type: '.$type.'</option>';
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
        if ($type == 'employed') continue;
        echo '<option value="' . $type . '">' . $type . '</option>';
    }
    echo "</select>";
    CloseCon($conn);
}

?>

<div class="ui segment">
    <div class="ui form">
        <form action="../../php/Employee/Process-Update.php" method="post">
            <div class="field">
                <?php displayEmployeeOption() ?>
                <label>Select an employee:</label>
            </div>
            <div class="field">
                <?php displayEmployeeAttributes() ?>
                <label>Choose the attribute to update:</label>
            </div>

            <div class="field">
                <input name="value" type="text" placeholder="Enter new value">
                <label>Enter new value:</label>
            </div>

            <div class="field">
                <input name="password" type="password" placeholder="Enter new password">
                <label>Enter new password if applicable (or enter old one):</label>
            </div>

            <div class="field">
                <input name="confirmpass" type="password" placeholder="Confirm new password">
                <label>Re-enter new password if applicable (or enter old one):</label>
            </div>

            <input class="positive ui button" type="submit" value="Update">

        </form>
    </div>
</div>
