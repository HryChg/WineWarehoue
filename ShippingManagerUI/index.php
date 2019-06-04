<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <title>Shipping Manager User Interface</title>
    <style type="text/css">
        .brand {
            background: #cbb09c !important; /*important trumps all other CSS rules, avoid using this as much as you can*/
        }

        .brand-text {
            color: #cbb09c !important;
        }

        form {
            max-width: 460px;
            margin: 20px auto;
            padding: 20px;
        }

    </style>

</head>
<body class="grey lighten-4">

<div class="container"></div>


<nav class="white z-depth-0">
    <div class="container">
        <!--"brand-text" is from our own css file-->
        <a href="#" class="brand-logo brand-text">Shipping Manager UI</a>
        <ui id="nav-mobile" class="right hide-on-small-and-down">

            <!--"brand" is from our own css file-->
            <li><a hred="#" class="btn brand z-depth-0">Log Out</a></li>
        </ui>
    </div>
</nav>

<!--OPTIONS-->
<section class="center">
    <h4 >What would you like to do today?</h4>
    <div class="row">
        <a href="#" class="waves-effect waves-light btn brand">view</a>
        <a href="#" class="waves-effect waves-light btn brand">add</a>
        <a href="#" class="waves-effect waves-light btn brand">update</a>
        <a href="#" class="waves-effect waves-light btn brand">delete</a>
    </div>
</section>

<!--View of All Orders-->
<section class="center">
    <h5>Most Recent Order</h5>

    <div class="container">
        <table>
            <thead>
            <tr>
                <th>Name</th>
                <th>Item Name</th>
                <th>Item Price</th>
            </tr>
            </thead>

            <tbody>
            <tr>
                <td>Alvin</td>
                <td>Eclair</td>
                <td>$0.87</td>
            </tr>
            <tr>
                <td>Alan</td>
                <td>Jellybean</td>
                <td>$3.76</td>
            </tr>
            <tr>
                <td>Jonathan</td>
                <td>Lollipop</td>
                <td>$7.00</td>
            </tr>
            </tbody>
        </table>
    </div>


</section>




<footer class="section">
    <div class="center grey-text">Copyright 2019 WineWarehouse</div>
</footer>

</body>
</html>