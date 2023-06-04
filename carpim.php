<!DOCTYPE html>
<html>
    <head>
        <title> Anasayfa </title>
        <meta charset="utf8">
    </head>
    <body>  
        <form action="" method="POST"> 
            <label for="sayi"> Hangi sayının çarpım tablosunu istersin?:</label>
                <input type="text" id="sayi" name="sayi">
            <br/><br/>
            
        <input type="submit" name="gonder" value="Hesapla"><br/><br/>
        </form>
    </body>

</html>
<?php
    if(isset($_POST["gonder"]))//kontrol adında bir form nesnesi var mı kontrolü yapılıyor
    {
        $sayi=$_POST["sayi"];
        for($i=1;$i<=10;$i++)
        {
            echo "<hr>";
            $sonuc = $i*$sayi;
            echo "$sayi X $i = $sonuc";
            echo "<hr>";
        }
    }     
?>
