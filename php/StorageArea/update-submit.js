$(document).ready(function() {
    $(".update-storage-temp").click(function(e) {
        e.preventDefault();
        var form = $("#update-storage-temp").serializeArray();
        var data = {};
        $(form).each(function(id, obj){
            data[obj.name] = obj.value;
        });
        // alert($("#update-storage-temp").serialize()); // Debug Tool
        $.ajax({
            url: $("#update-storage-temp").attr("url"),
            method: "POST",
            data: data,
            success: function(){
                $("#update-storage-temp")[0].reset(); 
                $("#storage-area-table").load('../../php/StorageArea/defaultView-storageArea.php');               
            },
            error: function(xhr){
                var err = JSON.parse(xhr.responseText);
                alert(err.Message + " Record unable to be added.");
            }
        });
    });
});
