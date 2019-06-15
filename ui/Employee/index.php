<!DOCTYPE html>
<html>
<head>
    <!--    Note later ui override the first-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <title>Employee User Interface</title>
    <style type="text/css">
        form {
            max-width: 500px;
            margin: 20px auto;
            padding: 20px;
        }

        h1, h2 {
            text-align: center;
        }

        .container {
            margin: 8px;
        }

        section {
            margin: 8px;
        }

        table {
            margin: 8px;
            overflow-x: scroll;
        }

        table th {
            text-align: center;
        }

        table thead {
            text-align: center;
        }

        select {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none; /* remove default arrow */
            /*background-image: url(...);   !* add custom arrow *!*/
        }
    </style>

</head>
<body>
<nav class="ui large menu">
    <div class="active item">
        Employee
    </div>
    <div class="right menu">


        <div class="ui simple dropdown item">
            Other
            <i class="dropdown icon"></i>
            <div class="menu">
                <div class="item"><a class="item" href="../Employee/index.php">Employee</a></div>
                <div class="item"><a class="item" href="../InventoryManager/index.php">Inventory Manager</a></div>
                <div class="item"><a class="item" href="../ShippingManager/index.php">Shipping Manager</a></div>
                <div class="item"><a class="item" href="../GeneralManager/index.php">General Manager</a></div>
            </div>
        </div>


        <div class="item">
            <a class="ui primary button" href="../../ui/Login/index.php">Log Out</a>
        </div>
    </div>
</nav>

<section id="ViewEmployee" class="section">
    <div class="ui grid centered">
        <div class="fifteen wide column">
            <h1 class="ui header">View All Employees</h1>
            <?php include '../../php/Employee/View.php' ?>
        </div>
        <div class="fifteen wide column">
            <h1>View All Wine</h1>
            <?php include '../../php/Wine/defaultView-wine.php'; ?>
        </div>

        <div class="fifteen wide column">
            <h1>Suppliers</h1>
            <?php include '../../php/Supplier/defaultView-supplier.php'; ?>
        </div>

        <div class="fifteen wide column">
            <h1>View Most Recent Order</h1>
            <?php include '../../php/OrderReceived/View-MostRecentOrder.php'; ?>
        </div>

        <div class="fifteen wide column">
            <h1>View Shipment</h1>
            <?php
            require_once '../../connect.php';
            $conn = OpenCon();
            include '../../php/Shipment/view_table.php';
            CloseCon($conn);
            ?>
        </div>

    </div>
</section>


<footer class="ui inverted vertical footer segment">
    <div class="ui container">
        Copyright 2019 WineWarehouse
    </div>
</footer>

</body>
</html>