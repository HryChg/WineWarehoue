<div class="">
    <div class="ui segment">
        <h2 class="ui header">View Top Clients</h2>
        <button class="ui black button"onclick="queryTopClient()">Query</button>
    </div>
</div>

<script>
    function queryTopClient() {
        $.ajax({
            type: "POST",
            url: '../../php/OrderReceived/Process-QueryTopClient.php',
            data: {action: 'queryTopClient'},
            success: function (resultHTML) {
                document.querySelector('#orderResult').innerHTML = resultHTML;
            }
        });
    }
</script>