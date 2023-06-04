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
            <label for="s1"></label>
                <input type="text" id="s1" name="s1">
            ile
            <label for="s2"></label>
                <input type="text" id="s2" name="s2">
            arasındaki sayıların toplamını
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

        $s1= $veri["s1"];
        $s2= $veri["s2"];
        $sonuc = 0;
        for($i = $s1; $i<= $s2; $i++ ){
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
            $sql = "INSERT INTO toplam (s1, s2, sonuc) VALUES ('$s1', '$s2', '$sonuc');";
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
    
            $s1= $veri["s1"];
            $s2= $veri["s2"];
            $islem= $veri["islem"];
    
            //veri okutma
            if ($vt->error) { 
                echo "Sorgu çalışırken hata oluştu. HATA:  ".$vt->error."<br />"; 
                echo "SQL: " .$sql;
            }
            $sql ="UPDATE islem SET sonuc='-1' WHERE sonuc='0';";
                //$sql = "INSERT INTO islem (s1, s2, sonuc) VALUES ('$s1', '$s2', '$sonuc');";
             //   $sql ="UPDATE iletisim SET mesaj='değiştir' WHERE mesaj=güzel;";
                //$sql ="UPDATE `iletisim` SET `mesaj` = 'asd' WHERE `iletisim`;";
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
