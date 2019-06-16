// Selects add-wine form and posts data to url, reloading table upon success
$(document).ready(function() {
    $(".add-wine").click(function(e) {
        e.preventDefault();
        var form = $("#add-wine").serializeArray();
        var data = {};
        $(form).each(function(id, obj){
            data[obj.name] = obj.value;
        });
        let msg = "";
        if (data['wineid'] == 0) {
            msg += "Please enter a wineID. \n";
        }
        if (data['alcohol'] < 0 || data['alcohol'] > 100){
            msg += "Alcohol outside of range 0-100%. \n";
        }
        if (data['sugar'] < 0 || data['sugar'] > 1){
            msg += "Sugar outside of range of 0-1. \n";
        }
        if (data['acid'] < 0 || data['acid'] > 7){
            msg += "Acid outside of pH range of 0-7. \n";
        }
        if (msg !== "") {
            alert(msg);
            data = {};
        }
        // alert($("#add-wine").serialize()); // Debug Tool
        $.ajax({
            url: $("#add-wine").attr("url"),
            method: "POST",
            data: data,
            success: function(){
                $("#add-wine")[0].reset();    
                $("#wine-table").load('../../php/Wine/defaultView-wine.php');
                $("#update-wine-form").load('../../php/Wine/updateWinePrice.php'); 
                $("#delete-wine-form").load('../../php/Wine/deleteWine.php');
                $("#query-wine-price-form").load('../../php/IMQueries/queryPriceFromWineBByID.php');
                $("#query-wine-grape-form").load('../../php/IMQueries/queryBrandFromWineAByGrape.php');
                $("#query-wine-taste-form").load('../../php/IMQueries/queryBrandFromWineAByWineTaste.php');
                $("#query-wine-agri-form").load('../../php/IMQueries/queryWineByAgriAttribute.php');
				$("#query-wine-minprice-form").load('../../php/IMQueries/queryMinPriceByBrand.php');
				$("#storedin-update-form").load('../../php/StoredIn/updateQuantityInLoc.php');
				$("#storedin-search-form").load('../../php/IMQueries/queryLocationAndQuantityByWineID.php');
				$("#delete-ar-form").load('../../php/AgriculturalRegion/deleteRegionByName.php');
                $("#insert-restock-form").load('../../php/Restock/insert-restock.php');
            },
            error: function(xhr){
                var err = JSON.parse(xhr.responseText);
                alert(err.Message + " Record unable to be added.");
            }
        });
    });
});
