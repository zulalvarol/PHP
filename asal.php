<?php

$s1 = 7;
$asal = 0;

for($i=2; $i<$s1; $i++){
    if($s1 % $i == 0){
    $asal = 1;
    }
}
if($asal==0){
    echo "asal";
}
else if ($asal==1){
    echo "asal degil";
}



?>