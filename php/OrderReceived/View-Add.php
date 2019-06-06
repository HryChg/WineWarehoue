<div class="container">

    <form action="../../php/OrderReceived/Process-Add.php" method="post">
        <h4>Add Order</h4>
        <div class="row">
            <div class="col s3">
                <div class="input">
                    <input placeholder="" name="orderID" type="text" class="validate">
                    <label for="orderID">orderID</label>
                </div>
            </div>
            <div class="col s3">
                <div class="input">
                    <input placeholder="" name="employeeID" type="text" class="validate">
                    <label for="employeeID">employeeID</label>
                </div>
            </div>
            <div class="col s3">
                <div class="input">
                    <input placeholder="" name="wineID" type="text" class="validate">
                    <label for="wineID">wineID</label>
                </div>
            </div>
            <div class="col s3">
                <div class="input">
                    <input placeholder="" name="quantity" type="text" class="validate">
                    <label for="quantity">quantity</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col s3">
                <div class="input">
                    <input placeholder="" name="retailer" type="text" class="validate">
                    <label for="retailer">retailer</label>
                </div>
            </div>
            <div class="col s3">
                <div class="input">
                    <input placeholder="" name="address" type="text" class="validate">
                    <label for="address">address</label>
                </div>
            </div>
            <div class="col s3">
                <div class="input">
                    <input placeholder="" name="backorder" type="text" class="validate">
                    <label for="backorder">backorder</label>
                </div>
            </div>
            <div class="col s3">
                <div class="input">
                    <input placeholder="" name="orderReceivedDate" type="text" class="validate">
                    <label for="orderReceivedDate">orderReceivedDate</label>
                </div>
            </div>
        </div>
        <div class="row center">
            <input class="waves-effect waves-light btn" type="submit" value="Add">
        </div>

    </form>

</div>


<!--





-->