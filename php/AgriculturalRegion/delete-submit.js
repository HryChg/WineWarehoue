// Selects form and posts data to url, reloading table upon success
$(document).ready(function() {
    $(".delete-ar").click(function(e) {
        e.preventDefault();
        var form = $("#delete-ar").serializeArray();
        var data = {};
        $(form).each(function(id, obj){
            data[obj.name] = obj.value;
        });
        alert($("#delete-ar").serialize()); // Debug Tool
        $.ajax({
            url: $("#delete-ar").attr("url"),
            method: "POST",
            data: data,
            success: function(){
                $("#delete-ar")[0].reset();    
                $("agricultural-region-table").load('../../php/AgriculturalRegion/defaultView-agriculturalRegion.php');       
            },
            error: function(xhr){
                var err = JSON.parse(xhr.responseText);
                alert(err.Message + " Record unable to be added.");
            }
        });
    });
});
