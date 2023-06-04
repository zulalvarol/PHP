<?php 

$s1 = 120;
$s2 = 16;



if($s1>$s2){
    $toplam= $s1 + $s2;
    $fark = $s1 - $s2;
    $carp = $s1 * $s2;
    $bol = $s1/$s2;
    $mod = $s1/$s2;

    echo "toplam: $toplam <br>";
    echo "fark: $fark <br>";
    echo "carp: $carp <br>";
    echo "bol: $bol <br>";
    echo "mod: $mod <br>";

}
else{
    $toplam= $s2 + $s1;
    $fark = $s2 - $s1;
    $carp = $s2 * $s1;
    $bol = $s2/$s1;
    $mod = $s2/$s1;

    echo "toplam: $toplam <br>";
    echo "fark: $fark <br>";
    echo "carp: $carp <br>";
    echo "bol: $bol <br>";
    echo "mod: $mod <br>";
}

?>