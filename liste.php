<?php
session_start();
?>

<!DOCTYPE html>
<html lang="tr">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
            <?php
            $vt = new mysqli('localhost', 'root', '', 'zulal');
            if ($vt->connect_error) {
                echo $vt->connect_error;
                exit;
            }

            $vt->set_charset("utf8"); 
            if ($vt->error) 
            { 
                echo "Karakter kodlaması ayarlanamadı. HATA: ".$vt->error."<br />"; 
                exit;
            } 
            
            // Verileri okutalım
            $sql = "select kayit.ad, belge.* from kayit, belge WHERE kayit.kod = belge.yukleyen";
           
            $sonuc = $vt->query($sql);
            if ($vt->error) // Bir hata varsa
            { 
                echo "Sorgu çalışırken bir hata oluştu. HATA: ".$vt->error."<br />";
                echo "SQL : ". $sql;
                exit;
            }           
            // Şimdi veri tabanında yazanları ekrana yazdıralım...
            while($satir = $sonuc->fetch_assoc()){
            echo "<b> Yükleyen: </b> ". htmlentities($satir['ad']) . "<br />";            
            echo "<b> Yüklediği zaman: </b> ". $satir['zaman'] . "<br />\r\n";
            echo "<b> Başlık: </b> ". htmlentities($satir['baslik']) . "<br />";
            echo "<b> Bağlantı: </b> <a href='". $satir['yol'] . "'> İncele </a><br />";
            echo "<b> Yorumlar : </b> <a href='detay.php?kod=". $satir['kod']."'> Oku ve Yaz </a><br />";  
            echo "<hr>";
            }
            // İşimiz bittiğinde sonucu silelim.
            $sonuc->free();

            $vt->close();
            ?>
    </body>
    </html>