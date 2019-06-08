<?php
echo
'<form action="../../php/Supplier/insert.php" method="post">
    <h1>Add Supplier</h1>
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
    <input type="submit" value="Add">
</form>'
?>
