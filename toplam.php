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
        <form action="" method="POST" class="buyuk"> 
            <label for="sayi">Sayı</label>
                <input type="text" id="sayi" name="sayi">
            <br/><br/>
        <input type="submit" name="gonder" value="Topla">
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

        $sayi= $veri["sayi"];
        $sonuc = 0;
        for($i = 0; $i<= $sayi; $i++ ){
            $sonuc= $sonuc + $i;
        }
        echo "Sonuç: ";
        echo $sonuc;
        echo "<br>";
        //veri okutma
        if ($vt->error) { 
            echo "Sorgu çalışırken hata oluştu. HATA:  ".$vt->error."<br />"; 
            echo "SQL: " .$sql;
        }
            $sql = "INSERT INTO topla (sayi, sonuc) VALUES ('$sayi','$sonuc');";
         //   $sql ="UPDATE iletisim SET mesaj='değiştir' WHERE mesaj=güzel;";
            //$sql ="UPDATE `iletisim` SET `mesaj` = 'asd' WHERE `iletisim`;";
            if($vt->query($sql)){
                echo "Hesaplama başarılı";
            }
            else// ($vt->error) Bir hata varsa
            { 
                echo "Sorgu çalışırken bir hata oluştu. HATA: ".$vt->error."<br />";
                echo "SQL : ". $sql;
            }
        $vt->close();
    }
   
?>
