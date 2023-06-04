<? php

$adet = 7;
$i;
$m=1;
$n=1;
$depo;

for($i=1; $i<=$adet; $i++){
    echo "$m";
    $depo = $m;
    $m = $n;
    $n = $n + $depo;
}


?>