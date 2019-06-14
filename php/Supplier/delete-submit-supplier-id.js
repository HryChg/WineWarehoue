$(document).ready(function() {
    $(".delete-supplier-id").click(function(e) {
        e.preventDefault();
        var form = $("#delete-supplier-id").serializeArray();
        var data = {};
        $(form).each(function(id, obj){
            data[obj.name] = obj.value;
        });
        // alert($("#delete-supplier-id").serialize()); // Debug Tool
        $.ajax({
            url: $("#delete-supplier-id").attr("url"),
            method: "POST",
            data: data,
            success: function(){
                $("#delete-supplier-id")[0].reset();   
                $("#supplier-table").load('../../php/Supplier/defaultView-supplier.php');             
            },
            error: function(xhr){
                var err = JSON.parse(xhr.responseText);
                alert(err.Message + " Record unable to be added.");
            }
        });
    });
});
