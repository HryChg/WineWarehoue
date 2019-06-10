<form class="ui form" action="../../php/IMQueries/process-queryWineBByExpiryRange.php" method="post">

    <h3>Query Wine By Expiry Date</h3>

    <p>
        <label>Expiry Date Range(YYYY-MM-DD): </label>
        <input type="text" name="lowRange">
        <label> to </label>
        <input type="text" name="highRange">
    </p>

    <input class="ui button" type="submit" value="Query">

</form>