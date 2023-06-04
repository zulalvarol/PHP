<?php

echo "merhaba zülal";

?>

<?php 
$mesaj="merhaba";
echo "$mesaj";
echo "<br/> <p style='font-weight: 900;'>";
echo $mesaj;
echo "</p>";
echo "<b> mesajj </b>";//oluyor ama kullanma
?>

<?php 
echo "yüze kadar sayalım <br/>";
for($i=1; $i<101; $i++){
    echo $i. "</br>";
}
?>

<?php //bir öncekinin üstüne ekler
echo "</br>";
$j = 10; 
for ($i=0; $i<10; $i++) { 
    $j += $j; 
    echo $j."<br />";
} 

?>

<?php 
echo "</br>";
$sayac = 0;
while ( $sayac < 100 ) { 
    $sayac = $sayac + 10; 
	echo $sayac."<br />";
} 
?> 


<?php 
echo "</br>";
    $sayi = 1;
    while ($sayi <= 300) {
        if ( ($sayi % 3) == 0) {
            echo "$sayi 3'e tam olarak bölünür.<BR>";
        }
        $sayi++;
    }

?>

<?php 
echo "</br>";
$i = 10; 
do { 
   echo $i."<br>";;
	$i--; 
} while ($i > 0) 
?>

<?php $isim = "Ali";  
if ($isim == "Hakan") { ?> 
	Merhaba Hakan 
<?php } elseif ($isim == "Ayşe") { ?>
	Merhaba Ayşe
<?php } else { ?>
	Sen Ayşe ya da Hakan değilsin.
<?php } ?> 

<?php 
echo "</br>";
echo "</br>";
$okul = "marmara";
$s = <<<IFADE
Metin değişkenlerini tanımlamak için kulanabileceğimiz
bir diğer yöntem ise HEREDOC denilen bu yöntemdir. 
Burada ' veya " rahatlıkla kullanılabilir, kaçış karakteri kullanmak
gerekmez. Dikkat edilecek nokta ise, <<< ile başlar
bitirirken altta bulunan bitiş ifadesi satırın ilk karakteri olmalıdır. 
Adını istediğini gibi değiştirebilirsiniz. </br>
Okulum: $okul
IFADE;
 
echo $s;
 ?> 

<?php 
echo "</br>";
$metin = "Bu bir cümledir."; 
$metinUzunluk = strlen($metin); 
echo "Metnin uzunluğu $metinUzunluk karakterdir.<br>"; 
?> 
<?php 
$metin = "Türkçe harfler: şiçöüğÜĞİŞÇÖ."; 
$metinUzunluk = strlen($metin); 
echo "Metnin uzunluğu $metinUzunluk karakterdir.<br>"; 
?> 

<?php 
$metin = "Türkçe harfler: şiçöüğÜĞİŞÇÖ."; 
$metinUzunluk = mb_strlen($metin); 
echo "Metnin uzunluğu $metinUzunluk karakterdir.<br>"; 
?> 

<?php 
$metin = "        Bu bir cümledir. "; 
echo "Boşluklar varken<br> \r\n $metin<br> \r\n"; 
$temizMetin = trim($metin); 
echo "Temizlenince <br>\r\n $temizMetin<br> \r\n";
echo $metin; 
?> 





