$(document).ready(function() {
    $(".submit-form").click(function() {
    var id = $("#id").val();
    var location = $("#location").val();
    var quantity = $("#quantity").val();

    $.ajax({
        url: "./../../php/StoredIn/insert.php",
        method: "POST",
        dataType: 'json',
        data: {
            id: id,
            location: location,
            quantity: quantity
        },
        success: function(data){
            console.log(data);
        },
        // error: function(jqXHR, err){
        //     alert(jqXHR.responseText + err.responseText + " Record unable to be added.");
        // }
    });
    });
    });