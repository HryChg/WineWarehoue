<h1 class="ui header">Delete OrderForWine</h1>
<div class="ui segment">
    <form class="ui form" action="../../php/OrderForWine/process-delete.php" method="POST">
        <div class="fields">
            <div class="field">
                <input name="orderID" type="text">
                <label for="orderID">orderID</label>
            </div>
            <div class="field">
                <input name="wineID" type="text">
                <label for="wineID">wineID</label>
            </div>
            <div class="field">
                <input name="locationID" type="text">
                <label for="locationID">locationID</label>
            </div>
        </div>
        <input class="ui red button" type="submit" value="Delete">
    </form>
</div>
