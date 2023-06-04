<!DOCTYPE html>
<html>
    <head>
        <title> Harfli Not Hesapla </title>
        <meta charset="utf8">
        <script src="https://use.fontawesome.com/bd206a2696.js"></script>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    
    </head>
    <body>  
        <?php
            include 'menu.inc.php';
        ?>
        <form action="" method="POST" class="buyuk"> 
            <label for="vize"> Vize:</label>
                <input type="text" id="vize" name="vize">
            <br/><br/>
            <label for="final"> Final:</label>
                <input type="text" id="final" name="final">
            <br/><br/>
            
            <br/><br/>
        <input type="submit" name="gonder" value="Hesapla"><br/><br/>
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

        $vize= $veri["vize"];
        $final= $veri["final"];

        $ort = ( $vize*0.4) + ($final*0.6);

        if($ort >= '90'){
            echo "<b>Harf Notunuz: AA </b><br>";
            $harf = "AA";

        }
        if($ort <= '85' && $ort >= '80'){
            echo "<b>Harf Notunuz: BA </b><br>";
            $harf = "BA";

        }
        if($ort >= '80' && $ort <= '84'){
            echo "<b>Harf Notunuz: BB </b><br>";
            $harf = "BB";

        }
        if($ort >= '75' && $ort <= '79'){
            echo "<b>Harf Notunuz: CB </b><br>";
            $harf = "CB";

        }
        if($ort >= '65' && $ort <= '74'){
            echo "<b>Harf Notunuz: CC </b><br>";
            $harf = "CC";

        }
        if($ort >= '55' && $ort <= '64'){
            echo "<b>Harf Notunuz: DC </b><br>";
            $harf = "DC";

        }
        if($ort >= '50' && $ort <= '54'){
            echo "<b>Harf Notunuz: DD </b><br>";
            $harf = "DD";

        }
        if($ort >= '45' && $ort <= '49'){
            echo "<b>Harf Notunuz: FD </b><br>";
            $harf = "FD";

        }
        if($ort >= '0' && $ort <= '44'){
            echo "<b>Harf Notunuz: FF </b><br>";
            $harf = "FF";

        }

        //veri okutma
        if ($vt->error) { 
            echo "Sorgu çalışırken hata oluştu. HATA:  ".$vt->error."<br />"; 
            echo "SQL: " .$sql;
        }
            $sql = "INSERT INTO harfnotu (vize, final, harf, ort) VALUES ('$vize', '$final', '$harf', '$ort');";

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
