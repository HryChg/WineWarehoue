<div class="container">
    <h1 class="ui header">Delete Order</h1>
    <form class="ui form container" action="../../php/OrderReceived/Process-Delete.php" method="post">
        <div class="fields">
            <div class="field">
                <input placeholder="" name="orderID" type="text" class="validate">
                <label for="orderID">orderID</label>
            </div>
        </div>
        <input class="ui red button" type="submit" value="Delete">
    </form>
</div>