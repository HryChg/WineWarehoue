<form class="ui form" action="../../php/IMQueries/process-queryWineBByExpiryRange.php" method="post">

    <h3>Search Wine By Expiry Date</h3>

    <label>Expiry Date Range(YYYY-MM-DD): </label>
    <div class="two fields">
        <div class="field">
            <input type="text" name="lowRange">
        </div>
        <div class="to"> to </div>
        <div class="field">
            <input type="text" name="highRange">    
        </div>
    </div>
    <input class="ui secondary button" type="submit" value="Query">

</form>