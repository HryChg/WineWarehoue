// Selects form id and posts data to url, reloading table upon success
// Notes:
// - make sure to add script to form (e.g., <script src="./../../php/Wine/update-submit.js"></script>)
// - switch form attributes: action to url
$(document).ready(function() {
    $(".update-wine").click(function(e) {
        e.preventDefault();
        var form = $("#update-wine").serializeArray();
        var data = {};
        $(form).each(function(id, obj){
            data[obj.name] = obj.value;
        });
        // alert($("#update-wine").serialize()); // Debug Tool
        $.ajax({
            url: $("#update-wine").attr("url"),
            method: "POST",
            data: data,
            success: function(){
                $("#update-wine")[0].reset();    
                $("#wine-table").load('../../php/Wine/defaultView-wine.php');            
            },
            error: function(xhr){
                var err = JSON.parse(xhr.responseText);
                alert(err.Message + " Record unable to be added.");
            }
        });
    });
});
