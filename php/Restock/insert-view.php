<script src="./../../php/Restock/submitForm.js"></script>
<form class="ui form" id="restock-form" method="post" url="./../../php/Restock/insert.php">
    <h3>Add Wine Restock Records</h3>
    <p>
        <label for="employeeid">Employee ID:</label>
        <input type="text" name="employeeid" id="employeeid">
    </p>
    <p>
        <label for="supplierid">Supplier ID:</label>
        <input type="text" name="supplierid" id="supplierid">
    </p>
    <p>
        <label for="wineid">Wine Barcode:</label>
        <input type="text" name="wineid" id="wineid">
    </p>
    <p>
        <label for="location">Location:</label>
        <input type="text" name="location" id="location">
    </p>
    <p>
        <label for="quantity">Quantity:</label>
        <input type="text" name="quantity" id="quantity">
    </p>
    <p>
        <label for="date">Restock Date (YYYY-MM-DD):</label>
        <input type="text" name="date" id="date">
    </p>
    <input class="ui button restock-submit submit-form" type="submit" value="Add">
</form>
<!-- <script>
$(document).ready(function() {
    $(".restock-submit.submit-form").click(function(e) {
        $("#restock-table").load('../../php/Restock/defaultView-restock.php');
    });
});
</script> -->