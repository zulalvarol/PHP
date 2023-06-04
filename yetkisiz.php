<?php
session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <title> Anasayfa </title>
        <meta charset="utf8">

    </head>
    <body>  
    <?php
        if (isset($_SESSION["yetki"]) and $_SESSION["yetki"]) {
            if (isset($_SESSION["yetki"]) and $_SESSION["yetki"]) 
            {
                echo "Merhaba ";
                //echo $_SESSION["adsoyad"];
                echo htmlspecialchars($_SESSION["ad"], ENT_QUOTES);
                echo "<br>";
            }
        }
    ?>
               
            >  <a href='islem.php'> İşlem </a><br>
            >  <a href='cikis.php'> Çıkış </a><br> 
            >  <a href='kayit.php'> Kayıt </a><br>
            >  <a href='dosya.php'> Dosya Yükle </a><br>
            >  <a href='harfnotu.php'> Harf Notunu Hesapla </a><br>
            >  <a href='carpim.php'>Çarpım Tablosu </a><br>
            >  <a href='aralik.php'>İki sayı arası toplamı </a><br>
            >  <a href='isimyazdir.php'>İsim Soyisim Yer değiştir </a><br>
            >  <a href='toplam.php'>Girilen sayıya kadar toplam </a><br>
            >  <a href='secim.php'>Geometrik şekil alan - çevre </a><br>
            >  <a href='us.php'>Üs Hesapla </a><br>

    </body>

</html>

