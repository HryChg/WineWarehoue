$(document).ready(function() {
    $(".restock-form").click(function(e) {
        e.preventDefault();
        var form = $("#restock-form").serializeArray();
        var data = {};
        $(form).each(function(id, obj){
            data[obj.name] = obj.value;
        });
        // alert($("#restock-form").serialize()); // Debug Tool
        $.ajax({
            url: $("#restock-form").attr("url"),
            method: "POST",
            data: data,
            success: function(){
                $("#restock-form")[0].reset();         
                $("#restock-table").load('../../php/Restock/defaultView-restock.php');                   },
            error: function(xhr){
                var err = JSON.parse(xhr.responseText);
                alert(err.Message + " Record unable to be added.");
            }
        });
    });
});