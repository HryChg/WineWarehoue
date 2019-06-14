$(document).ready(function() {
    $(".update-supplier").click(function(e) {
        e.preventDefault();
        var form = $("#update-supplier").serializeArray();
        var data = {};
        $(form).each(function(id, obj){
            data[obj.name] = obj.value;
        });
        // alert($("#update-supplier").serialize()); // Debug Tool
        $.ajax({
            url: $("#update-supplier").attr("url"),
            method: "POST",
            data: data,
            success: function(){
                $("#update-supplier")[0].reset();   
                $("#supplier-table").load('../../php/Supplier/defaultView-supplier.php');             
            },
            error: function(xhr){
                var err = JSON.parse(xhr.responseText);
                alert(err.Message + " Record unable to be added.");
            }
        });
    });
});
