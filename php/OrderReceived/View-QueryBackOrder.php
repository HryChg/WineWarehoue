<div class="">
    <div class="ui segment">
        <h2 class="ui header">View All Back Order</h2>
        <button class="ui black button"onclick="queryBackOrder()">Query</button>
    </div>
</div>

<script>
    function queryBackOrder() {
        $.ajax({
            type: "POST",
            url: '../../php/OrderReceived/Process-QueryBackOrder.php',
            data: {action: 'queryBackOrder'},
            success: function (resultHTML) {
                document.querySelector('#orderResult').innerHTML = resultHTML;
            }
        });
    }
</script>