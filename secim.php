<!DOCTYPE html>
<html>
    <head>
        <title> Anasayfa </title>
        <meta charset="utf8">
    </head>
    <body>  
        <form action="" method="POST"> 
            <label for="islem">Şekil:</label>
            <select name="sekilturu" >  
                <option value="kare"name="sekilturu" id="kare"> Kare </option>  
                <option value="ucgen" name="sekilturu" id="ucgen"> Üçgen </option>
                <option value="daire" name="sekilturu" id="daire"> Daire </option>
                <!--<option value="dikdortgen" name="sekilturu" id="dikdortgen"> Dikdörtgen </option>-->
            </select><br/><br/>
            <label for='deger'>Değer girin: </label>
            <input type='text' id='deger' name='deger'>
            
        <input type="submit" name="gonder" value="Devam">
        </form>
    </body>

</html>
<?php
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
            
            $sekilturu= $veri["sekilturu"];

            switch($sekilturu){
                case "kare":
                    $deger= $veri["deger"];
                    $alan = $deger*$deger;
                    $cevre = $deger * 4;
                break;
                case "daire":
                    $deger= $veri["deger"];
                    $cevre = 2*3*($deger);
                    $alan = 3*$deger*$deger;
                break;
                case "ucgen":
                    $deger= $veri["deger"];
                    $cevre = 3*($deger);
                    $alan = (1.73)/4*$deger*$deger;
                break;
                case "dikdortgen":break;
                    
            }
            
            
            echo "Alan: ";
            echo $alan;
            echo "<br>";
            echo "Çevre: ";
            echo $cevre;
            echo "<br>";
            //veri okutma
            if ($vt->error) { 
                echo "Sorgu çalışırken hata oluştu. HATA:  ".$vt->error."<br />"; 
                echo "SQL: " .$sql;
            }
            $sql = "INSERT INTO geometrik (sekilturu, alan, cevre) VALUES ('$sekilturu', '$alan', '$cevre');";

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
