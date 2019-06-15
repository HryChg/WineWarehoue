<script src="./../../php/Supplier/insert-supplier.js"></script>
<form class="ui form" id="supplier-form" method="post" url="../../php/Supplier/insert.php">
    <h3>Add Supplier</h3>
    <p>
        <label for="id">Supplier ID:</label>
        <input type="text" name="id" id="id">
    </p>
    <p>
        <label for="name">Company Name:</label>
        <input type="text" name="name" id="name">
    </p>
    <p>
        <label for="phone">Phone Number:</label>
        <input type="text" name="phone" id="phone">
    </p>
    <p>
        <label for="address">Address:</label>
        <input type="text" name="address" id="address">
    </p>
    <input class="ui button supplier-submit submit-form" type="submit" value="Add">
</form>