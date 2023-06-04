<?php
session_start();
//herkes ürünleri görecek

//kod var mı
if(!(isset($_GET["kod"]) and is_numeric($_GET["kod"]))){
    echo "<SCRIPT>
            alert('Bir şeyler yanlış')
            window.location.replace('liste.php');
            </SCRIPT>";
    exit;
}
$kod = $_GET["kod"];

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

if (isset($_POST["onay"])) // Formdan geldiyse
{
    $yapan = $_SESSION["kod"];
    $yapilan = $kod;

    $yorum = $_POST["yorum"];
    $yorum = trim($yorum);
    $yorum = $vt->real_escape_string($yorum);
    
    // Formdan gelen verileri VT'ye yazalım...
    $sql = "INSERT INTO yorum (yapan, yapilan, yorum) VALUES ('$ad', '$yapilan', '$yorum');";
    $vt->query($sql);
    if ($vt->error) // Bir hata varsa
    { 
        echo "Sorgu çalışırken bir hata oluştu. HATA: ".$vt->error."<br />";
        echo "SQL : ". $sql;
    }
}

// Verileri okutalım
    $sql = "SELECT * FROM yorum order by zaman desc";
    $sql = "SELECT kayit.ad, belge. * FROM kayit, belge WHERE kayit.kod = belge.yukleyen and belge.kod = $kod";
    $sonuc = $vt->query($sql);
    if ($vt->error) // Bir hata varsa
    { 
        echo "Sorgu çalışırken bir hata oluştu. HATA: ".$vt->error."<br />";
        echo "SQL : ". $sql;
        exit;
    }           
    /*$satirsayisi = $sonuc->num_rows;
    echo "Toplam $satirsayisi satır okundu!<br /><br />";*/
    if($sonuc->num_rows == 0){
        $vt->close();
        echo "<SCRIPT>
        alert('Böyle bir belge mevcut değil')
        window.location.replace('liste.php');
        </SCRIPT>";
exit;
    }
    // Şimdi veri tabanında yazanları ekrana yazdıralım...
   $satir = $sonuc->fetch_assoc();
    echo "<b> Yükleyen: </b> ". htmlentities($satir['ad']) . "<br/>";
    echo "<b> Yüklendiği zaman: </b> ". $satir['zaman'] . "<br />\r\n";
    echo "<b> Başlık: </b> ".  htmlentities($satir['baslik']) . "<br />";
    //echo "<b> Bağlantı: </b> <a href='". $satir['yol'] . "'>İncele</a><br />";
    //echo "<img src='". $satir['yol']."'>"; //görsel
    echo "<hr>";
    echo "<embed src='". $satir['yol']."' width='500' height='375' type='application/pdf'>";
    echo "<hr>";
    

    // İşimiz bittiğinde sonucu silelim.
    $sonuc->free();
    //ssadece giriş yapanlar yorum yazabilir
    if (isset($_SESSION["yetki"]) and $_SESSION["yetki"] == true){
        ?>
    <form method="POST" action="">
        Yorum:<textarea name="yorum"></textarea>
        <input type="submit" name="yorumgonder" value="Kaydet">
    </form>
    <?php   
    $yapan = $_SESSION["kod"];
    $yapilan = $kod;
    $yorum = $_POST["yorum"];

    $yorum = trim($yorum);
    $yorum = $vt->real_escape_string($yorum);
     $sql = "INSERT INTO yorum (yapan, yapilan, yorum) VALUES ('$yapan', '$yapilan', '$yorum');";

     if(!$vt->query($sql)){
        echo "Sorgu çalışırken bir hata oluştu. HATA: ".$vt->error."<br />";
        echo "SQL : ". $sql;
     }
    }
    //herkes yorumları okuyabilsin
    $sql = "SELECT * FROM yorum order by zaman desc";
    $sql = "SELECT kayit.ad, yorum. * FROM kayit, yorum WHERE kayit.kod = yorum.yapan AND yorum.yapilan = $kod";
    $sonuc = $vt->query($sql);
    if ($vt->error) // Bir hata varsa
    { 
        echo "Sorgu çalışırken bir hata oluştu. HATA: ".$vt->error."<br />";
        echo "SQL : ". $sql;
        exit;
    }           
    $satirsayisi = $sonuc->num_rows;
    echo "Toplam $satirsayisi satır okundu!<br /><br />";

    // Şimdi veri tabanında yazanları ekrana yazdıralım...
    while($satir = $sonuc->fetch_assoc()){
        echo "<b> Yorum yapan: </b> ". htmlentities($satir['ad']) . "<br />";
        echo "<b> Yorum zaman: </b> ". $satir['zaman'] . "<br />\r\n";
        echo "<b> Yorum: </b> ".  htmlentities($satir['yorum']) . "<br />";
        echo "<hr>";
    }

    $vt->close();

?>