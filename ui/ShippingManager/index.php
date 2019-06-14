<!DOCTYPE html>
<html>
<head>
    <!--    Note later ui override the first-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

    <title>Shipping Manager User Interface</title>
    <style type="text/css">
        form {
            max-width: 500px;
            margin: 20px auto;
            padding: 20px;
        }

        h1, h2 {
            text-align: center;
        }

        .container {
            margin: 8px;
        }

        section {
            margin: 8px;
        }

        table {
            margin: 8px;

            overflow-x: scroll
        }

        table th {
            text-align: center;
        }

        table thead {
            text-align: center;
        }

        select {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none; /* remove default arrow */
            /*background-image: url(...);   !* add custom arrow *!*/
        }


    </style>

</head>
<body>
<nav class="ui large menu">
    <a class="item" href="#SpecialFeatures">
        Home
    </a>
    <div class="active item">
        <h4>Shipping Manager User Interface</h4>
    </div>
    <div class="right menu">
        <a class="item" href="#OrderReceived">OrderReceived</a>
        <a class="item" href="#OrderForWine">OrderForWine</a>
        <a class="item" href="#Shipment">Shipment</a>
        <a class="item" href="#ReturnedShipment">ReturnedShipment</a>
        <a class="item" href="#ShippingManager">View Other ShippingManagers</a>


        <div class="ui simple dropdown item">
            Other
            <i class="dropdown icon"></i>
            <div class="menu">
                <div class="item"><a class="item" href="../Employee/index.php">Employee</a></div>
                <div class="item"><a class="item" href="../InventoryManager/index.php">Inventory Manager</a></div>
                <div class="item"><a class="item" href="../ShippingManager/index.php">Shipping Manager</a></div>
            </div>
        </div>

        <div class="item">
            <div class="ui primary button">Log Out</div>
        </div>
    </div>
</nav>

<section id="SpecialFeatures">
    <h1 class="ui header">Special Features</h1>
    <div class="ui grid container">
        <div class="ui fluid three item menu container">
            <a class="item" onclick="top10BackOrderedWine()">Top 10 BackOrdered Wine </a>
            <a class="item" onclick="top10TenRepeatWineOrder()">Top 10 Repeatedly Ordered on Wine</a>
            <a class="item" onclick="top10TenWineEveryRetailerOrdered()">Top 10 Wines Every Retailer Likes</a>
        </div>

    </div>
    <div class="ui two column centered grid">
        <div id="displaySpecialQueryResult" class="column"></div>
    </div>
    <script>
        function top10BackOrderedWine() {
            $.ajax({
                type: "POST",
                url: '../../php/SMQueries/process-queryTopTenMostBackorderedWine.php',
                data: {action: 'queryTopTenMostBackorderedWine'},
                success: function (resultHTML) {
                    document.querySelector('#displaySpecialQueryResult').innerHTML = resultHTML;
                }
            });
        }

        function top10TenRepeatWineOrder() {
            $.ajax({
                type: "POST",
                url: '../../php/SMQueries/process-queryTopTenRepeatWineOrder.php',
                data: {action: 'queryTopTenRepeatWineOrder'},
                success: function (resultHTML) {
                    document.querySelector('#displaySpecialQueryResult').innerHTML = resultHTML;
                }
            });
        }

        function top10TenWineEveryRetailerOrdered() {
            $.ajax({
                type: "POST",
                url: '../../php/SMQueries/process-queryTopTenWineEveryRetailerOrdered.php',
                data: {action: 'queryTopTenWineEveryRetailerOrdered'},
                success: function (resultHTML) {
                    document.querySelector('#displaySpecialQueryResult').innerHTML = resultHTML;
                }
            });
        }


    </script>

    <h2 class="ui header">Most Recent Order</h2>
    <div class="container">
        <?php include '../../php/OrderReceived/View-MostRecentOrder.php'; ?>
    </div>
</section>

<div class="ui section divider"></div>

<section id="OrderReceived" class="section">
    <h1 class="ui header">Order Received</h1>
    <?php include '../../php/OrderReceived/index.php'; ?>
</section>

<div class="ui section divider"></div>

<section id="OrderForWine" class="section center">
    <h1 class="ui header">Order For Wine</h1>
    <?php include '../../php/OrderForWine/index.php'; ?>
</section>

<div class="ui section divider"></div>

<section id="Shipment" class="section center">
    <h1 class="ui header">Shipment</h1>
    <?php include '../../php/Shipment/index.php';?>
</section>

<div class="ui section divider"></div>

<section id="ReturnedShipment" class="center">
    <div class="container">
        <h1 class="ui header">Returned Shipment</h1>
        <?php include '../../php/ReturnedShipment/index.php'; ?>
    </div>
</section>

<div class="ui section divider"></div>

<section id="ShippingManager" class="section" style="alignment: center">
    <h1 class="ui header">Shipping Manager</h1>
    <?php include '../../php/ShippingManager/index.php'; ?>
</section>

<div class="ui section divider"></div>

<footer class="ui inverted vertical footer segment">
    <div class="ui container">
        Copyright 2019 WineWarehouse
    </div>
</footer>

</body>
</html>