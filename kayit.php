<!DOCTYPE html>
<html>
    <head>
        <title> Kayıt </title>
        <meta charset="utf8">
    </head>
    <body>  
    <form action="" method="POST" class="buyuk"> 
        <label for="ad"> Ad:</label>
            <input type="text" id="ad" name="ad">
        <label for="ad"> Soyad:</label>
            <input type="text" id="soyad" name="soyad">
        <label for="kullanici"> Kullanıcı Adı:</label>
            <input type="text" id="kullanici" name="kullanici">
        <label for="sifre"> Şifre:</label>
            <input type="password" id="sifre" name="sifre">

        <input type="submit" name="gonder" value="Giriş">
    </form>

    </body>

</html>

<?php
    session_start();
    if(isset($_POST["gonder"])){
    //verileri al
        $vt = new mysqli("localhost", "root", "", "zulal");
        if ($vt->connect_error) {
            echo $vt->connect_error;
            exit;
        }
        $vt->set_charset("utf8"); 
        if ($vt->error) { 
            echo "Karakter kodlaması ayarlanamadı. HATA: ".$vt->error."<br />"; 
        }
        $veri = $_POST;
        unset($_POST);

        $ad= $veri["ad"];
        $soyad= $veri["soyad"];
        $kullanici= $veri["kullanici"];
        $sifre= $veri["sifre"];

        //veri okutma
        if ($vt->error) { 
            echo "Sorgu çalışırken hata oluştu. HATA:  ".$vt->error."<br />"; 
            echo "SQL: " .$sql;
        }
        $sifre = password_hash($sifre,PASSWORD_DEFAULT);

        $sql = "INSERT INTO kayit (ad, soyad, kullanici, sifre) VALUES ('$ad', '$soyad','$kullanici', '$sifre');";

        if($vt->query($sql)){
            echo "Kayıt başarılı";
        }
        else// ($vt->error) Bir hata varsa
        { 
            echo "Sorgu çalışırken bir hata oluştu. HATA: ".$vt->error."<br />";
            echo "SQL : ". $sql;
        }
        $vt->close();
    }
?>