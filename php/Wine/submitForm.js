// Within form, convert action to url and add id="form"
// Add this jquery script after your form:
// - submit button must have class: submit-form
// - the include php in your ui must be wrapped in a div (in this case, id: "storedin-table")
// - load the view file for your table
{/* <script>
$(document).ready(function() {
    $(".submit-form").click(function(e) {
        $("#storedin-table").load(\'../../php/StoredIn/defaultView-storedin.php\');
    });
});
</script>' */}

$(document).ready(function() {
    $(".wine-submit.submit-form").click(function(e) {
        e.preventDefault();
        var form = $("#wine-form").serializeArray();
        var data = {};
        $(form).each(function(id, obj){
            data[obj.name] = obj.value;
        });
        // alert($("#wine-form").serialize()); // Debug Tool
        $.ajax({
            url: $("#wine-form").attr("url"),
            method: "POST",
            data: data,
            success: function(){
                $("#wine-form")[0].reset();    
                $("#wine-table").load('../../php/Wine/defaultView-wine.php');            
            },
            error: function(xhr){
                var err = JSON.parse(xhr.responseText);
                alert(err.Message + " Record unable to be added.");
            }
        });
    });
});
