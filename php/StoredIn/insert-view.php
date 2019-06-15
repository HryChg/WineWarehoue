<script src="./../../php/StoredIn/insert-submit.js"></script>
<form class="ui form" id="storedin-form" method="post" url="./../../php/StoredIn/insert.php">
    <h3>Add Inventory</h3>
    <div class="field">
        <label for="id">Wine ID</label>
        <input type="text" name="id" id="id">
    </div>
    <div class="field">
        <label for="location">Location</label>
        <input type="text" name="location" id="location">
    </div>
    <div class="field">
        <label for="quantity">Quantity</label>
        <input type="text" name="quantity" id="quantity">
    </div>
    <input class="ui primary button storedin-submit" type="submit" value="Add">
</form>