$(document).ready(function() {
    $(".submit-form").click(function() {
    var form = $("#form").serializeArray();
    var data = {};
    $(form).each(function(obj){
        data[obj.name] = obj.value;
    });

    $.ajax({
        url: "./../../php/StoredIn/insert.php",
        method: "POST",
        data: data,
        success: function(data){
            console.log(data);
        },
        error: function(xhr){
            var err = JSON.parse(xhr.responseText);
            alert(err.Message + " Record unable to be added.");
        }
    });
    });
    });