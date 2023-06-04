<?php

$bir = 34;
$iki = 39;
$uc = 22;
$buyuk = 0;

if($bir>$iki && $bir>$uc){
    echo "<b> en büyük: $bir </b>";
}

else if($iki>$bir && $iki>$uc){
    echo "<b> en büyük: $iki </b>";
    //echo "<strong> en büyük: $iki </strong>";strong ile de kalın oluyor
}

else if($uc>$bir && $uc>$iki){
    echo "<strong> en büyük: $uc </strong>";
}

?>