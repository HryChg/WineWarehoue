<form class="ui form" action="../../php/IMQueries/process-queryWineByAlcoholRange.php" method="post">

    <h3>Search Wine By Alcohol Percentage</h3>

    <label>Alcohol percentage: </label>
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