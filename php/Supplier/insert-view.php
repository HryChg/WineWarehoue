<?php
echo
'<form class="ui form" url="../../php/Supplier/insert.php" method="post">
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
    <input class="ui button submit-form" type="submit" value="Add">
</form>
<script>
$(document).ready(function() {
    $(".submit-form").click(function(e) {
        $("#supplier-table").load(\'../../php/Supplier/defaultView-supplier.php\');
    });
});
</script>'
?>
