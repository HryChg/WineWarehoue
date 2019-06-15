$(document).ready(function() {
    $(".delete-supplier").click(function(e) {
        e.preventDefault();
        var form = $("#delete-supplier").serializeArray();
        var data = {};
        $(form).each(function(id, obj){
            data[obj.name] = obj.value;
        });
        let count = 0;
        data['supplierID'] ? count++ : count;
        data['name'] ? count++ : count;
        data['phoneNo'] ? count++ : count;
        if (count > 1){
            alert("Please only select one!");
            data = {};
        }
        // alert($("#delete-supplier").serialize()); // Debug Tool
        $.ajax({
            url: $("#delete-supplier").attr("url"),
            method: "POST",
            data: data,
            success: function(){
                $("#delete-supplier")[0].reset();   
                $("#supplier-table").load('../../php/Supplier/defaultView-supplier.php');
                $("#update-supplier-form").load('../../php/Supplier/updateSupplier.php');
                $("#delete-supplier-form").load('../../php/Supplier/deleteSupplier.php');
            },
            error: function(xhr){
                var err = JSON.parse(xhr.responseText);
                alert(err.Message + " Record unable to be added.");
            }
        });
    });
});
