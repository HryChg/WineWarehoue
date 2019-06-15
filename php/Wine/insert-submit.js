// Selects add-wine form and posts data to url, reloading table upon success
$(document).ready(function() {
    $(".add-wine").click(function(e) {
        e.preventDefault();
        var form = $("#add-wine").serializeArray();
        var data = {};
        $(form).each(function(id, obj){
            data[obj.name] = obj.value;
        });
        // alert($("#add-wine").serialize()); // Debug Tool
        $.ajax({
            url: $("#add-wine").attr("url"),
            method: "POST",
            data: data,
            success: function(){
                $("#add-wine")[0].reset();    
                $("#wine-table").load('../../php/Wine/defaultView-wine.php', function() {
                    // $("#update-wine-form").load('../../php/Wine/updateWinePrice.php', function() {
                    //     $("#delete-wine-brand-form").load('../../php/Wine/deleteWineByBrand.php');
                    //     $("#delete-wine-wineid-form").load('../../php/Wine/deleteWineByID.php');
                    //     $("#delete-wine-region-form").load('../../php/WineOrigin/deleteWineOrigin.php');
                    //     $("#query-wine-price-form").load('../../php/IMQueries/queryPriceFromWineBByID.php');
                    //     $("#query-wine-grape-form").load('../../php/IMQueries/queryBrandFromWineAByGrape.php');
                    //     $("#query-wine-taste-form").load('../../php/IMQueries/queryBrandFromWineAByWineTaste.php');
                    //     $("#query-wine-agri-form").load('../../php/IMQueries/queryWineByAgriAttribute.php');
                    //     $("#query-wine-minprice-form").load('../../php/IMQueries/queryMinPriceByBrand.php');
                    });

                });            
            },
            error: function(xhr){
                var err = JSON.parse(xhr.responseText);
                alert(err.Message + " Record unable to be added.");
            }
        });
    });
});
