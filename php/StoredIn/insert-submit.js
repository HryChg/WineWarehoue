$(document).ready(function() {
    $(".storedin-submit").click(function(e) {
        e.preventDefault();
        var form = $("#storedin-form").serializeArray();
        var data = {};
        $(form).each(function(id, obj){
            data[obj.name] = obj.value;
        });
        // alert($("#storedin-form").serialize()); // Debug Tool
        $.ajax({
            url: $("#storedin-form").attr("url"),
            method: "POST",
            data: data,
            success: function(){
                $("#storedin-form")[0].reset(); 
                $("#storedin-table").load('../../php/StoredIn/defaultView-storedin.php', function () {
                    $("#storedin-update-form").load('../../php/StoredIn/updateQuantityInLoc.php');
                });
            },
            error: function(xhr){
                var err = JSON.parse(xhr.responseText);
                alert(err.Message + " Record unable to be added.");
            }
        });
    });
});
