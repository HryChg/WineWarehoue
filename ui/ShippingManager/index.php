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


<div class="container"></div>


<section class="section center">
    <h5>Special Features</h5>
    <div class="row">
        <a href="#" class="waves-effect waves-light btn brand">Top 10 Repeat Order on Wine</a>
        <a href="#" class="waves-effect waves-light btn brand">Top 10 Wines Every Retailer Likes</a>
    </div>
    <div class="row">
        <a href="#" class="waves-effect waves-light btn brand">Top 5 BackOrdered Wine</a>
    </div>

    <h4>Most Recent Order</h4>

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

<!------------------------------------------------------------------------->
<section id="ShippingManager" class="section center">
    <h5>Shipping Manager</h5>
    <?php include '../../php/ShippingManager/index.php'; ?>
</section>

<!------------------------------------------------------------------------->
<section id=OrderForWine class="section center">
    <h5>Order For Wine</h5>
    <?php include '../../php/OrderForWine/index.php'; ?>
</section>

<!------------------------------------------------------------------------->
<section id=OrderReceived class="section">
    <h5>Order Received</h5>
    <?php include '../../php/OrderReceived/index.php'; ?>
</section>

<!------------------------------------------------------------------------->
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