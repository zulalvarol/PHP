<?php
session_start();
if(isset($_SESSION["yetki"]) and $_SESSION["yetki"]){
    if (!isset($_POST)){// dosya çok büyük
        header("Location:dosya.php");
        exit;
    }
    if (!isset($_FILES)){//dosya çok büyük
        header("Location:dosya.php");
        exit;
    }
    if (!isset($_POST["formdangelen"])){//formdan gelmiyor direkt urlden yazıyorsa
        header("Location:dosya.php");
        exit;
    }
    if ($_FILES["yuklenenDosya"]["error"] == 1){//dosya izin verilen değerden yüksek
        header("Location:dosya.php");
        exit;
    }
    if ($_FILES["yuklenenDosya"]["error"] <> 0){//farklı bir hata
        header("Location:dosya.php");
        exit;
    }
    if ($_FILES["yuklenenDosya"]["size"] > 1321999){//benim belirlediğim dosya boyutu
        header("Location:dosya.php");
        exit;
    }

    if ($_FILES["yuklenenDosya"]["type"] <> 'application/pdf' and $_FILES["yuklenenDosya"]["type"] <> "application/vnd.openxmlformats-officedocument.wordprocessingml.document" and $_FILES["yuklenenDosya"]["type"] <> "image/jpeg"){//dosya tipi uygun değil
        header("Location:dosya.php");
        exit;
    }
    $hedefKlasor = "depo/"; 
    $hedefKlasor = $hedefKlasor.time().basename($_FILES['yuklenenDosya']['name']); 
        //basename ile sadece dosyanın ismi alınıyor. 
        if (!move_uploaded_file($_FILES["yuklenenDosya"]['tmp_name'], $hedefKlasor)) 
        { 
            echo "Bir hata oluştu!";   
            echo "<a href='dosya.php'> Tekrar Dene</a>";
            exit;
        }
        echo basename( $_FILES['yuklenenDosya']['name'])." ismindeki dosya başarı ile yüklendi."; 
        
        $vt = new mysqli("localhost", "root", "", "zulal");
    
        /* check connection */
        if ($vt->connect_errno) {
            printf("Bağlanamadı: %s\n", $vt->connect_error);
            exit();
        }
    
        $vt->set_charset("utf8");
        if ($vt->error) {
            echo "Karakter ayarlaması yapılamadı!";
        }
        
        $veri = $_POST;
        unset($_POST);
        
        $baslik = $veri["baslik"];
        $baslik = trim($baslik);
        $baslik = $vt->real_escape_string($baslik);

        $kod = $_SESSION["kod"];
        $sql = "INSERT INTO belge (baslik, yol, yukleyen) VALUES ('$baslik', '$hedefKlasor', '$kod')";
        if ($vt->query($sql)) 
        {
            $vt->close();
            echo "<SCRIPT> 
                    alert('Belge başarı ile yüklendi!')
                    window.location.replace('liste.php');
                 </SCRIPT>";
            echo "<a href='liste.php> Yüklenen dosyaları listelemek için buraya tıklayınız.</a>";
            exit;
        } 
        else 
        {
            echo $vt->error;
            echo "<br />";
            echo "SQL: $sql";
        }
        $vt->close();
    }
else{
    header("Location:index.php");
}
?>

