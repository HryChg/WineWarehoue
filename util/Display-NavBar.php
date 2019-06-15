
<?php

// Displays navigation bar with given parameter
function displayNav($user) {
    $link = str_replace(' ','', $user);
    echo '
<head>
    <title>Wine Warehouse Login</title>
    <style type="text/css">
        .navbar {
            overflow: hidden;
            background-color: #8d253e;
            position: fixed;
            top: 0;
            width: 100%;
        }
    </style>

</head>
<body>
<div class="navbar">
<nav class="ui large menu">

    <a class="item" href="../../ui/'.$link.'/index.php">'.
    $user.
    '</a>
    <div class="right menu">        
        <a class="item" href="#StoredIn">Current Inventory</a>
        <a class="item" href="#Wine">Wines</a>
        <a class="item" href="#AgriculturalRegion">Wine Agricultural Regions</a>
        <a class="item" href="#Supplier">Supplier</a>
        <a class="item" href="#Restock">Restock</a>
        <a class="item" href="#StorageArea">Storage Temperature</a>

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
</nav>
</body>    


</div> 
';
}

?>
