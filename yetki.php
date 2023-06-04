<?php
session_start();
if(isset($_SESSION["yetki"]) AND $_SESSION["yetki"]){
    header('Location: index.php');
    exit;
}
//veri tabanına bağlan

    $vt = new mysqli('localhost', 'root', '', 'zulal');
    if ($vt->connect_error) {
        echo $vt->connect_error;
        exit;
    }

    $vt->set_charset("utf8"); 
    if ($vt->error) 
    { 
        echo "Karakter kodlaması ayarlanamadı. HATA: ".$vt->error."<br />"; 
    } 
    //verileri al
    $veri = $_POST;
    unset($_POST);

//gelen veriyi temizle
    $kullanici = $vt->real_escape_string($veri["kullanici"]);

    $sql = "SELECT * FROM kayit WHERE kullanici like '$kullanici'";
    $sonuc = $vt->query($sql);//git

    if($vt-> error){
        echo "Hata: ". $vt->error;
        echo "<br>";
        echo "SQL: ";
        echo $sql;
        exit;
    }

    echo "<pre>";
    var_dump($sonuc);
    echo "</pre>";
    if(!$sonuc->num_rows){
        //böyle bir kayıt gelmedi
        echo "böyle bir kayıt yok";
        header('Location: giris.php');
        exit;
    }
    $satir = $sonuc->fetch_assoc();
    if (!password_verify($veri["sifre"], $satir["sifre"])) {
        echo 'Şifre yanlış!';
        exit;
    } 
    if($kullanici == zülal){

        $_SESSION["yetki"] = true;
        $_SESSION["ad"] = $satir["ad"];
        $_SESSION["soyad"] = $satir["soyad"];
        $_SESSION["kod"] = $satir["kod"];
        $_SESSION["kullanici"] = $satir["kullanici"];

        header('Location: index.php');
        exit;
    }
    else{
        header('Location: index.php');
        exit;
    }
?>