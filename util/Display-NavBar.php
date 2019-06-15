<?php

// Displays navigation bar with given parameter
function displayNav($user) {
    $link = str_replace(' ','', $user);
    echo '<nav class="ui large menu">
    <a class="item" href="../../ui/'.$link.'/index.php">'.
    $user.
    '</a>
    <div class="right menu">

        <div class="ui simple dropdown item">
            Other
            <i class="dropdown icon"></i>
            <div class="menu">
                <div class="item"><a class="item" href="../Employee/index.php">Employee</a></div>
                <div class="item"><a class="item" href="../InventoryManager/index.php">Inventory Manager</a></div>
                <div class="item"><a class="item" href="../ShippingManager/index.php">Shipping Manager</a></div>
            </div>
        </div>

        <div class="item">
            <a class="ui primary button" href="../../ui/Login/index.php">Log Out</a>
        </div>
    </div>
</nav>';
}

?>