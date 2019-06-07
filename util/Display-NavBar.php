<?php

// Displays navigation bar with given parameter
function displayNav($title) {
    echo '<nav class="ui large menu">
    <a class="active item">
        Home
    </a>
    <div class="item">'.
        $title.
    '</div>
    <div class="right menu">

        <div class="ui simple dropdown item">
            Other
            <i class="dropdown icon"></i>
            <div class="menu">
                <div class="item">Employee</div>
                <div class="item">Inventory Manager</div>
                <div class="item"><a href="..\ShippingManager\index.php">Shipping Manager</a></div>
            </div>
        </div>

        <div class="item">
            <div class="ui primary button">Log Out</div>
        </div>
    </div>
</nav>';
}

?>