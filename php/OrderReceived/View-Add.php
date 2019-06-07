<h1 class="ui header">Add Order</h1>
<form class="ui form" action="../../php/OrderReceived/Process-Add.php" method="post">
    <div class="four fields">
        <div class="field">
            <input placeholder="" name="orderID" type="text" class="validate">
            <label for="orderID">orderID</label>
        </div>
        <div class="field">
            <input placeholder="" name="employeeID" type="text" class="validate">
            <label for="employeeID">employeeID</label>
        </div>
        <div class="field">
            <input placeholder="" name="wineID" type="text" class="validate">
            <label for="wineID">wineID</label>
        </div>
        <div class="field">
            <input placeholder="" name="quantity" type="text" class="validate">
            <label for="quantity">quantity</label>
        </div>
    </div>
    <div class="four fields">
        <div class="field">
            <input placeholder="" name="retailer" type="text" class="validate">
            <label for="retailer">retailer</label>
        </div>
        <div class="field">
            <input placeholder="" name="address" type="text" class="validate">
            <label for="address">address</label>
        </div>
        <div class="field">
            <input placeholder="" name="backorder" type="text" class="validate">
            <label for="backorder">backorder</label>
        </div>
        <div class="field">
            <input placeholder="" name="orderReceivedDate" type="text" class="validate">
            <label for="orderReceivedDate">orderReceivedDate</label>
        </div>
    </div>

    <input class="waves-effect waves-light btn" type="submit" value="Add">

</form>

