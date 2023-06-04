<?php

$bir = 34;
$iki = 59;
$uc = 22;
$dort = 17;
$bes = 39;
$buyuk = 0;

if($bir>$iki && $bir>$uc && $bir>$dort && $bir>$bes){
    $buyuk = $bir;
    $bir = 0;
    echo "en büyük: $buyuk";

}
else if($iki>$bir && $iki>$uc && $iki>$dort && $iki>$bes){
    $buyuk = $iki;
    $iki = 0;
    echo "en büyük: $buyuk";

}

else if($uc>$bir && $uc>$iki && $uc>$dort && $uc>$bes){
    $buyuk = $uc;
    $uc = 0;
    echo "en büyük: $buyuk";

}

else if($dort>$bir && $dort>$iki && $dort>$uc && $udort>$bes){
    $buyuk = $dort;
    $dort = 0;
    echo "en büyük: $buyuk";

}
else{
    $buyuk = $bes;
    $bes = 0;
    echo "en büyük: $buyuk";

}

echo "<br/>";

if($bir>$iki && $bir>$uc && $bir>$dort && $bir>$bes){
    echo "ikinci büyük: $bir";

}
else if($iki>$bir && $iki>$uc && $iki>$dort && $iki>$bes){
    echo "ikinci büyük: $iki";

}

else if($uc>$bir && $uc>$iki && $uc>$dort && $uc>$bes){
    echo "ikinci büyük: $uc";

}

else if($dort>$bir && $dort>$iki && $dort>$uc && $udort>$bes){
    echo "ikinci büyük: $dort";

}
else{
    echo "ikinci büyük: $bes";

}

?>