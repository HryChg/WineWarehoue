<!DOCTYPE html>
<html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="./../../util/submitForm.js"></script>
<?php
// include '../../template/input-query/create-table.php';
include '../../util/Display-NavBar.php';
include '../../util/Display-IM-Header.php';
// include '../../connect.php';
// $conn = OpenCon();

setStyle();
?>
<body>



<!------------------------------------------------------------------------->
<section id="Login" class="section center">
    <br>
    <h1 class="ui header">Login Page</h1>

    <div class="ui equal width relaxed grid">
        <div class="column"><?php include '../../php/Login/loginAsSM-view.php'; ?></div>
        <div class="column"><?php include '../../php/Login/loginAsIM-view.php'; ?></div>
        <div class="column"><?php include '../../php/Login/loginAsGeneralEmp-view.php'; ?></div>
    </div>

</section>



<!------------------------------------------------------------------------->

<footer class="section">
    <div class="center grey-text">Copyright 2019 WineWarehouse</div>
</footer>

</body>
</html>