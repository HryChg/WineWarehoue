// Selects form and posts data to url, reloading table upon success
$(document).ready(function() {
    $(".delete-wine").click(function(e) {
        e.preventDefault();
        var form = $("#delete-wine").serializeArray();
        var data = {};
        $(form).each(function(id, obj){
            data[obj.name] = obj.value;
        });
        let count = 0;
        data['brandName'] ? count++ : count;
        data['wineID'] ? count++ : count;
        data['regionName'] ? count++ : count;
        if (count > 1){
            alert("Please only select one!");
            data = {};
        }
        // alert($("#delete-wine").serialize()); // Debug Tool
        $.ajax({
            url: $("#delete-wine").attr("url"),
            method: "POST",
            data: data,
            success: function(){
                $("#delete-wine")[0].reset();    
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
