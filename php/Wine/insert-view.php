<script src="./../../php/Wine/insert-wine.js"></script>
<form class="ui form" id="add-wine" method="post" url="../../php/Wine/insert.php">
    <h3>Add Wine</h3>
    <div class="field">
        <label for="wineid">Wine ID</label>
        <input type="text" name="wineid" id="wineid">
    </div>
    <div class="field">
        <label for="price">Price</label>
        <input type="text" name="price" id="price">
    </div>
    <div class="field">
        <label for="color">Color</label>
        <input type="text" name="color" id="color">
    </div>
    <div class="field">
        <label for="brand">Brand Name</label>
        <input type="text" name="brand" id="brand">
    </div>
    <div class="field">
        <label for="year">Year</label>
        <input type="text" name="year" id="year">
    </div>
    <div class="two fields">
        <div class="field">
            <label for="grape1">Grape Type 1</label>    
            <input type="text" name="grape1" id="grape1">
        </div>
        <div class="field">
            <label for="grape2">Grape Type 2</label>
            <input type="text" name="grape2" id="grape2">
        </div>
    </div>
    <div class="two fields">
        <div class="field">
            <label for="taste1">Wine Taste 1</label>
            <input type="text" name="taste1" id="taste1">
        </div>
        <div class="field">
            <label for="taste2">Wine Taste 2</label>
            <input type="text" name="taste2" id="taste2">
        </div>
    </div>
    <div class="field">
        <label for="alcohol">Alcohol (%)</label>
        <input type="text" name="alcohol" id="alcohol">
    </div>
    <div class="field">
        <label for="acid">Acidity (pH)</label>
        <input type="text" name="acid" id="acid">
    </div>
    <div class="field">
        <label for="sugar">Sugar (from 0-1)</label>
        <input type="text" name="sugar" id="sugar">
    </div>
    <div class="field">
        <label for="expiry">Expiry Date (YYYY-MM-DD)</label>
        <input type="text" name="expiry" id="expiry">
    </div>
    <div class="field">
        <label for="region">Region</label>
        <input type="text" name="region" id="region">
    </div>
    <div class="two fields">
        <div class="field">
            <label for="temperature">Temperature</label>
            <input type="text" name="temperature" id="temperature">
        </div>
        <div class="field">
            <label for="moisture">Moisture</label>
            <input type="text" name="moisture" id="moisture">
        </div>
    </div>
    <div class="field">
        <label for="climate">Climate</label>
        <input type="text" name="climate" id="climate">
    </div>
    
    <input class="ui primary button add-wine" type="submit" value="Add">
</form>