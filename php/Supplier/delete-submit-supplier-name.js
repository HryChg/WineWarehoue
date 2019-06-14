$(document).ready(function() {
    $(".delete-supplier-name").click(function(e) {
        e.preventDefault();
        var form = $("#delete-supplier-name").serializeArray();
        var data = {};
        $(form).each(function(id, obj){
            data[obj.name] = obj.value;
        });
        // alert($("#delete-supplier-name").serialize()); // Debug Tool
        $.ajax({
            url: $("#delete-supplier-name").attr("url"),
            method: "POST",
            data: data,
            success: function(){
                $("#delete-supplier-name")[0].reset();   
                $("#supplier-table").load('../../php/Supplier/defaultView-supplier.php');             
            },
            error: function(xhr){
                var err = JSON.parse(xhr.responseText);
                alert(err.Message + " Record unable to be added.");
            }
        });
    });
});
