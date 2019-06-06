<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Inventory Manager User Interface</title>
    <style type="text/css">
        .brand {
            background: #cbb09c !important; /*important trumps all other CSS rules, avoid using this as much as you can*/
        }

        .brand-text {
            color: #cbb09c !important;
        }

        form {
            max-width: 460px;
            margin: 20px auto;
            padding: 20px;
        }

    </style>

</head>
<body class="grey lighten-4">

<div class="container"></div>


<nav class="white z-depth-0">
    <div class="container">
        <!--"brand-text" is from our own css file-->
        <a href="#" class="brand-logo brand-text">Inventory Manager UI</a>
        <ui id="nav-mobile" class="right hide-on-small-and-down">

            <!--"brand" is from our own css file-->
            <li><a href="#" class="btn brand z-depth-0">Log Out</a></li>
        </ui>
    </div>
</nav>


<section class="section center">
    <h5>Special Features</h5>
    <div class="row">
        <a href="#" class="waves-effect waves-light btn brand"><!-- Dummy --></a>  
        <a href="#" class="waves-effect waves-light btn brand"><!-- Dummy --></a>
    </div>
    <div class="row">
        <a href="#" class="waves-effect waves-light btn brand"><!-- Dummy --></a>
    </div>


    <h4>Most Recent Order</h4>

    <div class="container">
        <?php
        include '../../template/input-query/create-table.php';
        include '../../connect.php';
        // $conn = OpenCon();
        //include '../../php/OrderReceived/ViewOrderReceived.php'; ?>
    </div>

</section>

<!------------------------------------------------------------------------->
<section id="Wine" class="section center">
    <h5>Wine List</h5>
    <div class="container">
        <?php include '../../php/Wine/defaultView-wine.php'; ?>
    </div>
    
</section>

<!------------------------------------------------------------------------->
<section id="StoredIn" class="section center">
    <h5>Wine Inventory</h5>
    <div class="container">
        <?php include '../../php/StoredIn/defaultView-storedin.php'; ?>
    </div>
</section>

<!------------------------------------------------------------------------->
<section id="Supplier" class="section center">
    <h5>Supplier Details</h5>
    <div class="container">
        <?php include '../../php/Supplier/defaultView-supplier.php'; ?>
    </div>
</section>

<!------------------------------------------------------------------------->
<section id="Restock" class="section center">
    <h5>Restock</h5>
    <div class="container">
        <?php include '../../php/Restock/defaultView-restock.php'; ?>
    </div>
</section>

<!------------------------------------------------------------------------->
<section id="StorageArea" class="section center">
    <h5>Storage Details</h5>
    <div class="container">
        <?php include '../../php/StorageArea/defaultView-storageArea.php'; ?>
    </div>
</section>

<footer class="section">
    <div class="center grey-text">Copyright 2019 WineWarehouse</div>
</footer>

</body>
</html>