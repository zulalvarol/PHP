<?php

$sayi = 7556151;
$i = 0;

$i=strlen($sayi);
    echo " $i  basamaklıdır ";
?>

<?php

$sayi =123;
$adet = 0;
$depo;

$depo = $sayi;

while($sayi > 0){
    $sayi = $sayi/10;
    $adet++;
}

echo "$adet";

?>

<?php
$sayi1 = 2;
$sayi2 = 5;
$sayi3 = 1;
$sayi4 = 4;
$sayi5 = 7;
$sayi6 = 10;
$sayi7 = 8;
$sayi8 = 6;
$sayi9 = 3;
$sayi10 = 9;
for ($i = 1; $i < 11; $i++){
$a = "sayi" .$i; // $sayi1
$eb = $$a;
for ($j = 1; $j < 11; $j++){
$b = "sayi" .$j;
if ($eb < $$b){
$eb = $$b;
$x = $j;
}
}
$b = "sayi" .$x;
$$b = 0;
$e = "ebs" . $i; // ebs = en büyük sayı
$$e = $eb;
}
for ($i = 1; $i < 11; $i++){
$a = "ebs" .$i;
echo $$a;
echo "<br>";
}
?>