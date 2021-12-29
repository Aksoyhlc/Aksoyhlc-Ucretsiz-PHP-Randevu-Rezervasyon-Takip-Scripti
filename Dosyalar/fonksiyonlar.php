<?php 


function durumlar()
{
	$x=[
		'Beklemede','Devam Ediyor', 'İptal Edildi', 'Tamamlandı'
	];

	return $x;
}


function cok($sql)
{
	global $db;

	$sorgu=$db->prepare($sql);
	$sorgu->execute();
	$liste=$sorgu->fetchAll(PDO::FETCH_ASSOC);

	return $liste;
}


function tek($sql)
{
	global $db;

	$sorgu=$db->prepare($sql);
	$sorgu->execute();
	$liste=$sorgu->fetch(PDO::FETCH_ASSOC);

	return $liste;
}


function tekil($tablo,$sutun,$id)
{
	global $db;

	$sorgu=$db->prepare("SELECT * FROM $tablo WHERE $sutun='$id' ");
	$sorgu->execute();
	$liste=$sorgu->fetch(PDO::FETCH_ASSOC);

	return $liste;
}

function oturum()
{
	if (!isset($_SESSION['kul_id']) OR !isset($_SESSION['kul_isim']) OR !isset($_SESSION['kul_mail']) ) {
		header("location:giris.php?oturumac");
		exit;
	} else {
		return true;
	}
}



function netgsm($numara,$mesaj){

  $username = "850303xxxx"; //
  $password = urlencode("xxxx"); //

  $url= "https://api.netgsm.com.tr/sms/send/get/?usercode=$username&password=$password&gsmno=$numara&message=".urlencode($mesaj)."&msgheader=MesajBaslik";

  $ch = curl_init($url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  $http_response = curl_exec($ch);
  $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

  if($http_code != 200){
  	echo "$http_code $http_response\n";
  	return false;
  }
  $balanceInfo = $http_response;
  echo "MesajID : $balanceInfo";
  $x=explode(" ", $balanceInfo);

  if ($x[0]==00) {
  	return true;
  } else {
  	return false;
  }

}


function iletimerkezi($numara,$mesaj){
	file_get_contents("http://api.iletimerkezi.com/v1/send-sms/get/?username=".urlencode('KULLANICI_ADI')."&password=".urlencode('KULLANICI_SIFRESI')."&text=".urlencode($mesaj)."&receipents=".urlencode($numara)."&sender=".urlencode('ILETI MRKZI'));
	return true;
}



?>