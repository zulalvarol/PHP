<?php
session_start();
if(isset($_SESSION["yetki"]) and $_SESSION["yetki"]){

?>
<!DOCTYPE html>
<html>
    <head>
        <title> Güncelle </title>
        <meta charset="utf8">
        <script src="https://use.fontawesome.com/bd206a2696.js"></script>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    
    </head>
    <body> 
    <form action="" method="POST"> 
        <label for="eski"> Hangi Değer Değişsin:</label>
            <input type="text" id="eski" name="eski">
            <br/><br/> 
        <label for="yeni">Yeni Değer: </label>
            <input type="text" id="yeni" name="yeni">
            <br/><br/> 

        <input type="submit" name="guncel" value="Güncelle"><br/><br/>
        </form>
        <a href="cikis.php"> Çıkış </a>
    </body>

</html>
<?php
    if(isset($_POST["guncel"])){

        
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

            $eski= $veri["eski"];
            $yeni= $veri["yeni"];
    
            //veri okutma
            if ($vt->error) { 
                echo "Sorgu çalışırken hata oluştu. HATA:  ".$vt->error."<br />"; 
                echo "SQL: " .$sql;
            }
            $sql ="UPDATE islem SET sonuc='$yeni' WHERE sonuc='$eski';";
                if($vt->query($sql)){
                    echo "Güncelleme başarılı";
                }
                else// ($vt->error) Bir hata varsa
                { 
                    echo "Sorgu çalışırken bir hata oluştu. HATA: ".$vt->error."<br />";
                    echo "SQL : ". $sql;
                }
            $vt->close();
        }
?>
<?php

}

else{
    header("Location:index.php");
    //giderken mesaj versin
}
?>
