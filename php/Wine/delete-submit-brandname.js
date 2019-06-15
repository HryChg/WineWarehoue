// Selects form and posts data to url, reloading table upon success
$(document).ready(function() {
    $(".delete-wine-brandname").click(function(e) {
        e.preventDefault();
        var form = $("#delete-wine-brandname").serializeArray();
        var data = {};
        $(form).each(function(id, obj){
            data[obj.name] = obj.value;
        });
        alert($("#delete-wine-brandname").serialize()); // Debug Tool
        $.ajax({
            url: $("#delete-wine-brandname").attr("url"),
            method: "POST",
            data: data,
            success: function(){
                $("#delete-wine-brandname")[0].reset();    
                $("#wine-table").load('../../php/Wine/defaultView-wine.php');            
            },
            error: function(xhr){
                var err = JSON.parse(xhr.responseText);
                alert(err.Message + " Record unable to be added.");
            }
        });
    });
});
