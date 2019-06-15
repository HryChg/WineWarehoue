<?php
session_start();
if(isset($_SESSION['username'])) {
    session_unset();
    session_destroy();;
}
?>
<!DOCTYPE html>
<html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="./../../util/submitForm.js"></script>
<?php

include '../../util/Display-Login-Header.php';
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

<footer class="ui inverted vertical footer segment">
    <div class="ui container">
        Copyright 2019 WineWarehouse
    </div>
</footer>

</body>
</html>