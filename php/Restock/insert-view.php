<script src="./../../php/Restock/submitForm.js"></script>
<form class="ui form" id="restock-form" method="post" url="./../../php/Restock/insert.php">
    <h3>Add Wine Restock Records</h3>
    <div class='field'>
        <label for="employeeid">Employee ID:</label>
        <input type="text" name="employeeid" id="employeeid">
    </div>
    <div class='field'>
        <label for="supplierid">Supplier ID:</label>
        <input type="text" name="supplierid" id="supplierid">
    </div>
    <div class='field'>
        <label for="wineid">Wine Barcode:</label>
        <input type="text" name="wineid" id="wineid">
    </div>
    <div class='field'>
        <label for="location">Location:</label>
        <input type="text" name="location" id="location">
    </div>
    <div class='field'>
        <label for="quantity">Quantity:</label>
        <input type="text" name="quantity" id="quantity">
    </div>
    <div class='field'>
        <label for="date">Restock Date (YYYY-MM-DD):</label>
        <input type="text" name="date" id="date">
    </div>
    <input class="ui button primary restock-submit submit-form" type="submit" value="Add">
</form>