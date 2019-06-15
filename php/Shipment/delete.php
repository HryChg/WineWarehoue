<!DOCTYPE html>
<html>


<h1 class="ui header">Delete Shipment</h1>
<div class="ui segment">
    <form class="ui form container" action="../../php/Shipment/process-delete.php" method="POST">
        <div class="fields">
            <div class="field">
                <input name="shipmentID" type="text">
                <label for="shipmentID">shipmentID</label>
            </div>
        </div>
        <input class="ui red button" type="submit" value="Delete">
    </form>
</div>
