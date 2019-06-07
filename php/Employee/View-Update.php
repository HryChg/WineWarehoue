<div class="container">
    <form action="../../php/Employee/Process-Update.php" method="post">
        <h4>Update Employee</h4>
        Update the name of an employee

        <br/>
        <label>Employee</label>

        <?php

        $conn = OpenCon();

        $result = $conn->query("SELECT employeeID, name From Employee");

        echo "<select name='employeeID' class='ui dropdown'>";

        while ($row = $result->fetch_assoc())
        {
            unset($employeeID, $name);
            $employeeID = $row['employeeID'];
            $name = $row['name'];
            echo '<option value="'.$employeeID.'">'.'EmployeeID: '.$employeeID.' '.$name.'</option>';
        }

        echo "</select>";

        CloseCon($conn);

        ?>

        <br>



        <label>Employee New Name</label>
        <input name="name" type="text" placeholder="Enter new name">

        <div class="row center">
            <input class="waves-effect waves-light btn" type="submit" value="Update">
        </div>

    </form>
</div>