<div class="ui segment">
    <div class="ui form">
        <form action="../../php/Employee/Process-Add.php" method="post">
            <div class="field">
                <div class="input">
                    <input placeholder="" name="employeeID" type="text" class="validate">
                    <label for="orderID">employeeID</label>
                </div>
            </div>
            <div class="field">
                <div class="input">
                    <input placeholder="" name="type" type="text" class="validate">
                    <label for="employeeID">type</label>
                </div>
            </div>
            <div class="field">
                <div class="input">
                    <input placeholder="" name="name" type="text" class="validate">
                    <label for="wineID">name</label>
                </div>
            </div>
            <div class="field">
                <div class="input">
                    <input placeholder="" name="password" type="password" class="validate">
                    <label for="wineID">password</label>
                </div>
            </div>
            <div class="field">
                <div class="input">
                    <input placeholder="" name="confirmPassword" type="password" class="validate">
                    <label for="wineID">confirm password</label>
                </div>
            </div>
            <input class="ui primary button" type="submit" value="Add">
        </form>
    </div>
</div>