<?php
include '../../connect.php';

$conn = OpenCon();
echo "Connected Successfully";
CloseCon($conn);


?>


<!doctype html>

<html lang="en">
<head>
    <meta charset="utf-8">

    <title>The HTML5 Herald</title>
    <meta name="description" content="The HTML5 Herald">

</head>

<body>


<h1> This is a test </h1>

<!--action="sum.php" directs you to sum.php page-->
<form action="sum.php" method="post">

    <label>Value of A</label>

    <input name="val-a" type="text" placeholder="Type Here">

    <br>

    <label>Value of B</label>

    <input name="val-b" type="text" placeholder="Type Here">

    <br>

    <br>

    <input type="submit" value="Show Sum">


</form>

</body>
</html>