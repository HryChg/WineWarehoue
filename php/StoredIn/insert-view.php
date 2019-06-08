<?php
echo
'<form class="ui form" id="form" action="../../php/StoredIn/insert.php" method="post">
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
    <input class="ui button" type="submit" value="Add">
</form>'
?>