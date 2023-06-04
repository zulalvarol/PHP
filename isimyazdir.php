<?php
session_start(); 
if (isset($_SESSION["yetki"]) AND $_SESSION["yetki"]) {
    header('Location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="tr">
    <head>
        <meta charset="UTF-8">  <!-- türkçe karakter -->
        <title>PDF Paylaşım</title>
</head>
<body>
<!--$adsoyad="Ekrem Erkan";  -->
    
    <?php
    $ad = "Erkan";
    $soyad = "Ekrem";
    echo "\$adi="."\""."$soyad".";";
    echo "<br>";
    echo "\$soyadi="."\""."$ad". "\"";
    echo ";";
    echo "<br>";
    echo "\$adsoyad=";
    echo "\"";
    echo "$soyad"." ". "$ad";
    echo "\"";
    echo ";";
    
    ?>
</body>
</html>
