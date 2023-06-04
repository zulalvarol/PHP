<? php

$s1 = 23;
$s2 = 3245;
$i;
$ekok;

$i = $s1;

while(1){
    if($i % $s1 == 0 && $i % $s2 == 0){
        $ekok = $i;
        break;
    }
    i++;

}

echo "ekok: $ekok";

?>

<?php
    $a=128;
    $b=6;
    $carp=$a*$b;


    if($a>$b){
    $buyuk=$a;
    }
    
    else{
    $buyuk=$b;
    }

    for($i=$carp;$i>=$buyuk;$i--){
        if($i%$a==0 and $i%$b==0){
        $okek=$i;
        }
    }

echo "$okek";