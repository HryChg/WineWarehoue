<div class="ui grid centered">
    <div class="fifteen wide column">
        <?php include 'View.php' ?>
    </div>
    <div class="five wide column">
        <?php include 'View-Add.php' ?>
    </div>
    <div class="five wide column">
        <?php include 'View-Update.php' ?>
    </div>
    <div class="five wide column">
        <?php include 'View-Delete.php' ?>
    </div>

    <div class="row">
        <div class="four wide column" >
            <div class="container">
                <?php include 'View-QueryBackOrder.php' ?>
            </div>
            <div class="container">
                <?php include 'View-QueryWineOrderQuantity.php' ?>
            </div>
            <div class="container">
                <?php include 'View-QueryTopClient.php' ?>
            </div>
        </div>
        <div class="eleven wide column" >
            <h1>Display Result</h1>
            <div id="orderResult" class="container">

            </div>
        </div>
    </div>


</div>
