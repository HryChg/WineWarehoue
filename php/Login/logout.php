<?php

session_unset();
session_destroy();
header("Location: ../../ui/Login/index.php");

?>