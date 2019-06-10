// Within form, add relative url path to the process method
// Add the following to your form to use:
// <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
// <script src="./submitForm.js"></script>

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
