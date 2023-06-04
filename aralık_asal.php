<?php

$ilk= 10;
$son= 189;
$adet = 0;
$asal;

for($i=$ilk; $i<$son; $i++){
    $asal=1;
    for($j=2; $j<=$i/2; $j++){
        if($i % $j == 0){
        $asal=0;
        break;
        }
    }
    if($asal == 1 && $i>=2){
    echo "asal: $i <br>";
    $adet++;
    }
}
echo "toplam: $adet"



?>