<?php
function displayEmployeeOption(){
    $conn = OpenCon();
    $result = $conn->query("SELECT employeeID, name From Employee");
    echo "<select name='employeeID' class='ui dropdown'>";
    while ($row = $result->fetch_assoc())
    {
        unset($employeeID, $name);
        $employeeID = $row['employeeID'];
        $name = $row['name'];
        echo '<option value="'.$employeeID.'">'.'EmployeeID: '.$employeeID.' '.'Name: '.$name.'</option>';
    }
    echo "</select>";
    CloseCon($conn);
}

function displayEmployeeAttributes(){
    $conn = OpenCon();
    $result = $conn->query("SHOW COLUMNS FROM Employee");
    if (!$result) {
        echo 'Could not show columns from Employees';
        exit;
    }
    echo "<select name='column' class='ui dropdown'>";
    while ($row = $result->fetch_assoc())
    {
        unset($type);
        $type = $row['Field'];
        if ($type == 'employeeID') continue;
        echo '<option value="'.$type.'">'.$type.'</option>';
    }
    echo "</select>";
    CloseCon($conn);
}

?>


<div class="container">
    <form action="../../php/Employee/Process-Update.php" method="post">
        <h4>Update Employee</h4>
        Update the name of an employee

        <br/>
        <label>Employee</label>

        <?php displayEmployeeOption() ?>

        <br>






        <label>Choose the attribute to update</label>
        <? displayEmployeeAttributes() ?>

        <br/>
        <label>Enter New Value</label>
        <input name="value" type="text" placeholder="Enter new value">

        <div class="row center">
            <input class="waves-effect waves-light btn" type="submit" value="Update">
        </div>
    </form>
</div>