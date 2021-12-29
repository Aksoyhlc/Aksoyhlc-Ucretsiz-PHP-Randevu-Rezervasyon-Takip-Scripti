<?php 

/*
Bu yazılım aksoyhlc.net | satis.aksoyhlc.net tarafından geliştirilmiştir.

Özel script, yazılım ve mobil uygulama işlemleriniz için
aksoyhlc.net/iletisim iletişim formundan 

0850 305 9257 Whatsapp destek hattından 

iletişime geçebilirsiniz.
*/



@ob_start();
@session_start();

$host="localhost";
$veritabani_ismi="XXXXXXXXX"; //Veritabanı ismi
$kullanici_adi="XXXXXXXXX";//kullanıcı ismi
$sifre="XXXXXXXX";//kullanıcı şifresi



try{
	$db = new PDO("mysql:host=$host;dbname=$veritabani_ismi;charset=utf8",$kullanici_adi,$sifre);
} catch(PDOException $e){
	echo "Veritabanı Bağlantı İşlemi Başarısız Oldu";
	echo $e->getMessage();
	exit;
}


$sorgu=$db->prepare("SELECT * FROM ayarlar WHERE id=1");
$sorgu->execute();
$ayarcek=$sorgu->fetch(PDO::FETCH_ASSOC);


require_once __DIR__.'/fonksiyonlar.php';

?>