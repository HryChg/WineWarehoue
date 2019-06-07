<div class="container">
    <form action="../../php/Employee/Process-Add.php" method="post">
        <h4>Add Employee</h4>
        <div class="row">
            <div class="col s3">
                <div class="input">
                    <input placeholder="" name="employeeID" type="text" class="validate">
                    <label for="orderID">employeeID</label>
                </div>
            </div>
            <div class="col s3">
                <div class="input">
                    <input placeholder="" name="type" type="text" class="validate">
                    <label for="employeeID">type</label>
                </div>
            </div>
            <div class="col s3">
                <div class="input">
                    <input placeholder="" name="name" type="text" class="validate">
                    <label for="wineID">name</label>
                </div>
            </div>

        </div>

        <div class="row center">
            <input class="waves-effect waves-light btn" type="submit" value="Add">
        </div>
    </form>
</div>
