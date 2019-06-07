<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css"/>
    <title>Inventory Manager User Interface</title>
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
        }

        table th {
            text-align: center;
        }

        table thead {
            text-align: center;
        }


    </style>

</head>
<body>
<nav class="ui large menu">
    <a class="active item">
        Home
    </a>
    <div class="item">
        Inventory Manager
    </div>
    <div class="right menu">


        <div class="ui simple dropdown item">
            Other
            <i class="dropdown icon"></i>
            <div class="menu">
                <div class="item">Employee</div>
                <div class="item">Inventory Manager</div>
                <div class="item"><a href="..\ShippingManager\index.php">Shipping Manager</a></div>
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
        <a class="item active"><!--  --></a>
        <a class="item"><!--  --></a>
        <a class="item"><!--  --></a>
    </div>
</div>
</section>

<?php
    include '../../template/input-query/create-table.php';
    include '../../connect.php'; 
?>

<!------------------------------------------------------------------------->
<section id="StoredIn" class="section center">
    <h1 class="ui header">Current Wine Inventory</h1>
    <div class="container">
        <?php include '../../php/StoredIn/defaultView-storedin.php'; ?>
    </div>

    <?php include '../../php/StoredIn/insert-view.php'; ?>
    <?php include '../../php/StoredIn/updateQuantityInLoc.php'; ?>

</section>

<!------------------------------------------------------------------------->
<section id="Wine" class="section center">
    <h1 class="ui header">Wine List</h1>
    <div class="container">
        <?php include '../../php/Wine/defaultView-wine.php'; ?>
    </div>
    
    <?php include '../../php/Wine/view-insert.php'; ?>
    <?php include '../../php/Wine/updateWinePrice.php'; ?>
    <?php include '../../php/Wine/deleteWineAByBrand.php'; ?>
    <?php include '../../php/Wine/deleteWineBByBrandOrID.php'; ?>
    <?php include '../../php/WineOrigin/deleteWineOrigin.php'; ?>
</section>

<!------------------------------------------------------------------------->
<section id="AgriculturalRegion" class="section center">
    <h1 class="ui header">Agricultural Regions of Wine in Stock</h1>
    <div class="container">
        <?php include '../../php/AgriculturalRegion/defaultView-agriculturalRegion.php'; ?>
    </div>
    
    <?php include '../../php/AgriculturalRegion/updateRegionTemp.php'; ?>
    <?php include '../../php/AgriculturalRegion/updateMoisture.php'; ?>
    <?php include '../../php/AgriculturalRegion/deleteRegionByName.php'; ?>

</section>
<!------------------------------------------------------------------------->
<section id="Supplier" class="section center">
    <h1 class="ui header">Supplier Details</h1>
    <div class="container">
        <?php include '../../php/Supplier/defaultView-supplier.php'; ?>
    </div>

    <?php include '../../php/Supplier/insert-view.php'; ?>
    <?php include '../../php/Supplier/updateSupplierAAddress.php'; ?>
    <?php include '../../php/Supplier/updateSupplierBPhone.php'; ?>
    <?php include '../../php/Supplier/deleteSupplierA.php'; ?>
    <?php include '../../php/Supplier/deleteSupplierBByIDOrPhone.php'; ?>

</section>

<!------------------------------------------------------------------------->
<section id="Restock" class="section center">
    <h1 class="ui header">Restock</h1>
    <div class="container">
        <?php include '../../php/Restock/defaultView-restock.php'; ?>
    </div>

    <?php include '../../php/Restock/insert-view.php'; ?>
</section>

<!------------------------------------------------------------------------->
<section id="StorageArea" class="section center">
    <h1 class="ui header">Storage Details</h1>
    <div class="container">
        <?php include '../../php/StorageArea/defaultView-storageArea.php'; ?>
    </div>

    <?php include '../../php/StorageArea/updateStorageTemp.php'; ?>
</section>

<!------------------------------------------------------------------------->
<footer class="section">
    <div class="center grey-text">Copyright 2019 WineWarehouse</div>
</footer>

</body>
</html>