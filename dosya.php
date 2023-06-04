<?php
session_start();
if(isset($_SESSION["yetki"]) and $_SESSION["yetki"]){
?>
<!DOCTYPE html>
<html lang="tr">
    <head>
        <title> Dosya </title>
        <meta charset="utf8">
    </head>
    <body>
<form enctype="multipart/form-data" action="yukle.php" method="POST"> 
<input type="text" name="baslik" placeholder="Lütfen başlığı giriniz!">
    <input name="yuklenenDosya" id="file" type="file">
                <br><br>
                <input type="submit" id="yukle" name="formdangelen" value=Yükle>
                <br><br>
                <input type="submit" id="listele" name="listele" value=Listele>
                <a href="liste.php">Listele</a> </input>
        </form>    
</body>
</html>
<?php
}
else{
    header("Location:index.php");
    //giderken mesaj versin
}
?>

