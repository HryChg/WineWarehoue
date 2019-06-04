<?php

$a = $_POST['val-a'];

$b = $_POST['val-b'];

$c = 0;
if (isset($a) and isset($b)){
    $c = $a + $b;
}



echo "Sum is $c";

?>