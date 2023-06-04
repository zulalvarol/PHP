<?php
session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <title> Anasayfa </title>
        <meta charset="utf8">
        <script src="https://use.fontawesome.com/bd206a2696.js"></script>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    
    </head>
    <body>  
    <?php
        if (isset($_SESSION["yetki"]) and $_SESSION["yetki"]) {
            if (isset($_SESSION["yetki"]) and $_SESSION["yetki"]) 
            {
                echo "Merhaba ";
                //echo $_SESSION["adsoyad"];
                echo htmlspecialchars($_SESSION["kullanici"], ENT_QUOTES);
                echo "<br>";
                //Karakterleri kontrol ettir!
            
            }
            echo ">  <a href='islem.php'> İşlem </a><br>
            >  <a href='cikis.php'> Çıkış </a><br> 
            >  <a href='kayit.php'> Kayıt </a><br>
            >  <a href='dosya.php'> Dosya Yükle </a><br>
            >  <a href='harfnotu.php'> Harf Notunu Hesapla </a><br>
            >  <a href='sil.php'> Güncelle </a> <br>
            >  <a href='carpim.php'>Çarpım Tablosu </a><br>
            >  <a href='aralik.php'>İki sayı arası toplamı </a><br>
            >  <a href='isimyazdir.php'>İsim Soyisim Yer değiştir </a><br>
            >  <a href='toplam.php'>Girilen sayıya kadar toplam </a><br>
            >  <a href='secim.php'>Geometrik şekil alan - çevre </a><br>
            >  <a href='us.php'>Üs Hesapla </a><br>";
        }
        
        else 
        {
            echo "Giriş Yapılı Değil :( <br>
            > <a href='islem.php'>İşlem </a><br>
            >  <a href='giris.php'>Giriş </a><br> 
            >  <a href='kayit.php'>Kayıt </a><br>
            >  <a href='dosya.php'>Dosya Yükle </a><br>
            >  <a href='harfnotu.php'>Harf Notunu Hesapla </a><br> 
            >  <a href='carpim.php'>Çarpım Tablosu </a><br>
            >  <a href='aralik.php'>İki sayı arası toplamı </a><br>
            >  <a href='isimyazdir.php'>İsim Soyisim Yer değiştir </a><br>
            >  <a href='toplam.php'>Girilen sayıya kadar toplam </a><br>
            >  <a href='secim.php'>Geometrik şekil alan - çevre </a><br>
            >  <a href='us.php'>Üs Hesapla </a><br>";
            
        }
    ?>
    </body>

</html>

