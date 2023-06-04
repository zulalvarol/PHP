<?php
$isim="zülal";
 echo "<table border = '1px'>";//table açılıyor
 for($satir=1; $satir <4; $satir++)
 {
    echo "<tr>";//satır açılıyor
    for($sutun = 1; $sutun<11; $sutun++)
    {
    $renk=rand(0,255*255*255);//renk oluşturuluyor
        echo "\t<td bgcolor= '#".$renk."'>$isim </td> ";//farklı renk seçeneklerine sahip arkaplanlı bir sutun oluşturur
    }
    echo "</tr>";
 }
 echo "</table>";
 ?>

