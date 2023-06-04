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
    > <a href='index.php'>Anasayfa </a><br> <br> 
        <form action="" method="POST" class="buyuk"> 
            <label for="sayi">Sayi:</label>
                <input type="text" id="sayi" name="sayi">

            <label for="us">Üs</label>
                <input type="text" id="us" name="us">
            <br/><br/>
        <input type="submit" name="gonder" value="Hesapla">
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
        $us= $veri["us"];
        $sonuc = 1;
        for($i = 0; $i< $us; $i++ ){
            $sonuc= $sonuc * $sayi;
        }
        echo "Sonuç: ";
        echo $sonuc;
        echo "<br>";
        //veri okutma
        if ($vt->error) { 
            echo "Sorgu çalışırken hata oluştu. HATA:  ".$vt->error."<br />"; 
            echo "SQL: " .$sql;
        }
            $sql = "INSERT INTO us (sayi, us, sonuc) VALUES ('$sayi', '$us', '$sonuc');";
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
