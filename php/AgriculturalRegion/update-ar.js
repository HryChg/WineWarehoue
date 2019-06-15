$(document).ready(function() {
    $(".update-ar").click(function(e) {
        e.preventDefault();
        var form = $("#update-ar").serializeArray();
        var data = {};
        $(form).each(function(id, obj){
            data[obj.name] = obj.value;
        });
        $.ajax({
            url: $("#update-ar").attr("url"),
            method: "POST",
            data: data,
            success: function(){
                $("#update-ar")[0].reset();   
                $("#agricultural-region-table").load('../../php/AgriculturalRegion/defaultView-agriculturalRegion.php');             
            },
            error: function(xhr){
                var err = JSON.parse(xhr.responseText);
                alert(err.Message + " Record unable to be added.");
            }
        });
    });
});
