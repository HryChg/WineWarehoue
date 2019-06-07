<!DOCTYPE html>
<html>
<head>
    <!--    Note later ui override the first-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css"/>
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

        .container{
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
            appearance: none;       /* remove default arrow */
            /*background-image: url(...);   !* add custom arrow *!*/
        }


    </style>

</head>
<body>
<nav class="ui large menu">
    <a class="active item">
        Home
    </a>
    <div class="item">
        Shipping Manager
    </div>
    <div class="right menu">


        <div class="ui simple dropdown item">
            Other
            <i class="dropdown icon"></i>
            <div class="menu">
                <div class="item">Employee</div>
                <div class="item">Inventory Manager</div>
                <div class="item">Shipping Manager</div>
            </div>
        </div>


        <div class="item">
            <div class="ui primary button">Log Out</div>
        </div>
    </div>
</nav>

<section id="Special Features">
    <h1 class="ui header">Special Features</h1>

    <div class="ui grid container">
        <div class="ui fluid three item menu container">
            <a class="item active">Top 5 BackOrdered Wine</a>
            <a class="item">Top 10 Repeatedly Ordered on Wine</a>
            <a class="item">Top 10 Wines Every Retailer Likes</a>
        </div>
    </div>

    <h2 class="ui header">Most Recent Order</h2>

    <div class="container">
        <?php
        include '../../connect.php';
        $conn = OpenCon();
        include '../../php/OrderReceived/View-MostRecentOrder.php'; ?>
    </div>

</section>

<section id="ReturnedShipment" class="center">
    <div class="container">
        <h5>Returned Shipment</h5>

        <?php
        include '../../php/ReturnedShipment/returnedShipment.php';
        ?>
    </div>
</section>


<section id="ShippingManager" class="section center">
    <h1 class="ui header">Shipping Manager</h1>
    <?php include '../../php/ShippingManager/index.php'; ?>
</section>


<section id=OrderForWine class="section center">
    <h1 class="ui header">Order For Wine</h1>
    <?php include '../../php/OrderForWine/index.php'; ?>
</section>


<section id=OrderReceived class="section">
    <h1 class="ui header">Order Received</h1>
    <?php include '../../php/OrderReceived/index.php'; ?>
</section>


<section id=Shipment class="section center">
    <h5>Shipment</h5>
    <?php include '../../php/Shipment/index.php';
    CloseCon($conn); ?>
</section>


<footer class="section">
    <div class="center grey-text">Copyright 2019 WineWarehouse</div>
</footer>

</body>
</html>