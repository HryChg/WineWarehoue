<?php
echo
'
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="./submitForm.js"></script>
<form class="ui form" id="form" method="post" url="./../../php/StoredIn/insert.php">
    <h3>Add Storage Quantity</h3>
    <p>
        <label for="id">Wine Barcode:</label>
        <input type="text" name="id" id="id">
    </p>
    <p>
        <label for="location">Location:</label>
        <input type="text" name="location" id="location">
    </p>
    <p>
        <label for="quantity">Quantity:</label>
        <input type="text" name="quantity" id="quantity">
    </p>
    <input class="ui button submit-form" type="submit" value="Add">
</form>'
?>
<script>

</script>