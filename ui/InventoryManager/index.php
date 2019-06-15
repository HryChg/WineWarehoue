<?php
session_start();
?>
<!DOCTYPE html>
<html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<?php
include_once '../../template/input-query/create-table.php';
include '../../util/Display-NavBar.php';
include '../../util/Display-IM-Header.php';
include_once '../../connect.php';
$conn = OpenCon();

setStyle();
?>


<?php
if($_SESSION['employeeType'] != "IM") {
    header("Location:../../ui/Login/index.php");
}
?>


<?php displayNav("Inventory Manager")?>

<style>
    section::before{
        display: block;
        content: " ";
        margin-top: -70px;
        height: 70px;
        visibility: hidden;
        pointer-events: none;
    }
</style>

<body>
<br>
<br>
<br>
<section id="Special Features">

<h1 class="ui header">Special Features</h1>

<div class="ui grid container">
    <div class="ui fluid two item menu container">
        <a class="item" href='../../php/IMQueries/process-queryTopSupplier.php'>Check Top Supplier</a>
        <a class="item" href='../../php/IMQueries/process-queryMaxPriceOfWineB.php'>Check Most Expensive Wine In Inventory</a>

    </div>
</div>
</section>
<br>
<br>


<!------------------------------------------------------------------------->
<section id="StoredIn" class="section center">

    <h1 class="ui header">Current Wine Inventory</h1>
    <div class="container" id="storedin-table">
        <?php include '../../php/StoredIn/defaultView-storedin.php'; ?>
    </div>

    <div class="ui equal width relaxed grid">
            <div class="column"><?php include '../../php/StoredIn/insert-view.php'; ?></div>
            <div class="column" id="storedin-update-form">
                <?php include '../../php/StoredIn/updateQuantityInLoc.php'; ?>
            </div>
            <div class="column"><?php include '../../php/IMQueries/queryLocationAndQuantityByWineID.php'; ?></div>
    </div>

</section>

<!------------------------------------------------------------------------->
<section id="Wine" class="section center">

    <h1 class="ui header">Wine List</h1>
    <div class="container" id="wine-table">
        <?php include '../../php/Wine/defaultView-wine.php'; ?>
    </div>
    
    <div class="ui equal width relaxed grid">
        <div class="column">
            <?php include '../../php/Wine/insert-view.php'; ?>
        </div>
        <div class="column">
            <div id="update-wine-form"><?php include '../../php/Wine/updateWinePrice.php'; ?></div>
            <div id="delete-wine-form"><?php include '../../php/Wine/deleteWine.php'; ?></div>
        </div>        
        <div class="column">
            <div id="query-wine-price-form"><?php include '../../php/IMQueries/queryPriceFromWineBByID.php'; ?></div>
            <div id="query-wine-grape-form"><?php include '../../php/IMQueries/queryBrandFromWineAByGrape.php'; ?></div>
            <div id="query-wine-taste-form"><?php include '../../php/IMQueries/queryBrandFromWineAByWineTaste.php'; ?></div>
            <div id="query-wine-alcohol-form"><?php include '../../php/IMQueries/queryWineByAlcoholRange.php'; ?></div>
            <div id="query-wine-sugar-form"><?php include '../../php/IMQueries/queryWineBySugarRange.php'; ?></div>
            <div id="query-wine-expiry-form"><?php include '../../php/IMQueries/queryWineBByExpiryRange.php'; ?></div>
            <div id="query-wine-agri-form"><?php include '../../php/IMQueries/queryWineByAgriAttribute.php'; ?></div>
            <div id="query-wine-minprice-form"><?php include '../../php/IMQueries/queryMinPriceByBrand.php'; ?></div>
            <div id="query-wine-minprice-form"><?php include '../../php/IMQueries/queryExpiredWineInStorage.php'; ?></div>
        </div>
    </div>

</section>

<!------------------------------------------------------------------------->
<section id="AgriculturalRegion" class="section center">

    <h1 class="ui header">Agricultural Regions of Wine in Stock</h1>
    <div class="container" id="agricultural-region-table">
        <?php include '../../php/AgriculturalRegion/defaultView-agriculturalRegion.php'; ?>
    </div>
    
    <div class="ui equal width relaxed grid">
        <div class="column">
            <div id="update-ar-form"><?php include '../../php/AgriculturalRegion/update-ar.php'; ?></div>
        </div>
        <div class="column">
            <div id="delete-ar-form"><?php include '../../php/AgriculturalRegion/deleteRegionByName.php'; ?></div>
        </div>
    </div>
    
</section>
<!------------------------------------------------------------------------->
<section id="Supplier" class="section center">

    <h1 class="ui header">Supplier Details</h1>
    <div class="container" id="supplier-table">
        <?php include '../../php/Supplier/defaultView-supplier.php'; ?>
    </div>

    <div class="ui equal width relaxed grid">
        <div class="column">
            <div><?php include '../../php/Supplier/insert-view.php'; ?></div>
        </div>
        <div class="column">
            <div id="update-supplier-form"><?php include '../../php/Supplier/updateSupplier.php'; ?></div>
        </div>
        <div class="column">
            <div id="delete-supplier-form"><?php include '../../php/Supplier/deleteSupplier.php'; ?></div>
        </div>
    </div>

</section>

<!------------------------------------------------------------------------->
<section id="Restock" class="section center">

    <h1 class="ui header">Restock</h1>
    <div class="container" id="restock-table">
        <?php include '../../php/Restock/defaultView-restock.php'; ?>
    </div>

    <div class="ui equal width relaxed grid">
        <div class="column">
            <?php include '../../php/Restock/insert-view.php'; ?>
        </div>
    </div>

</section>

<!------------------------------------------------------------------------->
<section id="StorageArea" class="section center">

    <h1 class="ui header">Storage Temperature</h1>
    <div class="container" id="storage-area-table">
        <?php include '../../php/StorageArea/defaultView-storageArea.php'; ?>
    </div>

    <div class="ui equal width relaxed grid">
        <div class="column">
            <?php include '../../php/StorageArea/updateStorageTemp.php'; ?>
        </div>
    </div>
    
</section>

<!------------------------------------------------------------------------->

<footer class="section">
    <div class="center grey-text">Copyright 2019 WineWarehouse</div>
</footer>

</body>

</html>