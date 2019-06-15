<form class="ui form" action="../../php/IMQueries/process-queryWineBySugarRange.php" method="post">

    <h3>Search Wine By Sugar Levels</h3>

    <div class="field"><label>Sugar level (0-1): </label></div>
    <div class="two fields">
        <div class="field">
            <input type="text" name="lowRange">
        </div>
        <div class="to">to</div>
        <div class="field">
            <input type="text" name="lowRange">
        </div>
    </div>
    <input class="ui secondary button" type="submit" value="Query">

</form>