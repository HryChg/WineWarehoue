<script src="./../../php/Supplier/insert-supplier.js"></script>
<form class="ui form" id="supplier-form" method="post" url="../../php/Supplier/insert.php">
    <h3>Add Supplier</h3>
    <div class='field'>
        <label for="id">Supplier ID</label>
        <input type="text" name="id" id="id">
    </div>
    <div class='field'>
        <label for="name">Company Name</label>
        <input type="text" name="name" id="name">
    </div>
    <div class='field'>
        <label for="phone">Phone Number</label>
        <input type="text" name="phone" id="phone">
    </div>
    <div class='field'>
        <label for="address">Address</label>
        <input type="text" name="address" id="address">
    </div>
    <input class="ui primary button supplier-submit submit-form" type="submit" value="Add">
</form>