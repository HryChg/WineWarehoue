<div class="ui segment">
    <h3 class="ui header">View Total Quantity of <br> Each Wine Being Ordered</h3>
    <button class="ui black button" onclick="queryWineOrderQuantity()">Query</button>
</div>


<script>
    function queryWineOrderQuantity() {
        $.ajax({
            type: "POST",
            url: '../../php/OrderReceived/Process-QueryWineOrderQuantity.php',
            data: {action: 'queryWineOrderQuantity'},
            success: function (resultHTML) {
                document.querySelector('#orderResult').innerHTML = resultHTML;
            }
        });
    }
</script>