// Within form, add relative url path to the process method
// Add the following to your form to use:
//  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
//  <script src="./submitForm.js"></script>
// Add this jquery script after your form:
// - submit button must have class: submit-form
// - the include php in your ui must be wrapped in a div (in this case, id: "storedin-table")
// - load the view file for your table
{/* <sscript>
$(document).ready(function() {
    $(".submit-form").click(function(e) {
        $("#storedin-table").load(\'../../php/StoredIn/defaultView-storedin.php\');
    });
});
</script>' */}

$(document).ready(function() {
    $(".submit-form").click(function(e) {
        e.preventDefault();
        var form = $("#form").serializeArray();
        var data = {};
        $(form).each(function(id, obj){
            data[obj.name] = obj.value;
        });
        $.ajax({
            url: $("#form").attr("url"),
            method: "POST",
            data: data,
            success: function(){
                $("#form")[0].reset();                
            },
            error: function(xhr){
                var err = JSON.parse(xhr.responseText);
                alert(err.Message + " Record unable to be added.");
            }
        });
    });
});
