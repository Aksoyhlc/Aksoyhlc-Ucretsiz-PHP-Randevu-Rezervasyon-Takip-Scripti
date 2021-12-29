<?php 
require_once '../config.php';

$simdi=date("Y-m-d H:i:s");





require_once 'phpmailer/Exception.php';
require_once 'phpmailer/PHPMailer.php';
require_once 'phpmailer/SMTP.php';


$mail = new PHPMailer\PHPMailer\PHPMailer();

$mail->isSMTP();                                       
$mail->Host       = 'HOST_ADRESINIZ';                
$mail->SMTPAuth   = true;                              
$mail->Username   = 'MAIL_ADRESINIZ';                
$mail->Password   = 'MAIL_SIFRENIZ';                          
$mail->SMTPSecure = "ssl";       
$mail->Port       = 465;                               
$mail->isHTML(true); 
$mail->setFrom($mail->Username, 'Ökkeş Aksoy');
$mail->Subject = 'Randevu Hatırlatma Maili';
$mail->CharSet = "UTF-8";




foreach (cok("SELECT * FROM randevu INNER JOIN musteri ON musteri.musteri_id=randevu.musteri WHERE tarih>'$simdi'") as $key => $value) {
	$tarih1=strtotime($simdi);
	$tarih2=strtotime($value['tarih']);
	$fark=$tarih2-$tarih1;
	$dakika=floor($fark/60);
	$saat=floor($dakika/60);

	$saat=24;
	if ($value['mail_durum']==0) {
		if($saat==24 || $saat==48){





			$mail->addAddress($value['musteri_mail'], $value['musteri_isim']);                                
			$mail->Body    = "<h2>Sayın, {$value['musteri_isim']}</h2><br><p>$saat saat Sonra Aksoyhlc Yazılım ile ".$value['tarih']." tarihinde randevunuz bulunmaktadır randevudan 15 dakika önce randevu yerinde bulunun.</p>";

			if ($mail->send()) {
				echo "Müşteriye Gönderildi";
				tek("UPDATE randevu SET mail_durum=1 WHERE id={$value['id']}");
			} else {
				echo "Müşteriye Gönderilemedi<hr>";
				print_r($mail->ErrorInfo);

			}

			$mail->clearAddresses();


			$mail->addAddress($ayarcek['mail'], "Ökkeş Aksoy");                                
			$mail->Body    = "<h2>Sayın, Ökkeş Aksoy</h2><br><p>$saat saat Sonra {$value['musteri_isim']} isimli müşteri ile ".$value['tarih']." tarihinde randevunuz bulunmaktadır.</p>";

			if ($mail->send()) {
				echo "Firma Yetkilisine Gönderildi";

			} else {
				echo "Firma Yetkilisine Gönderilemedi<hr>";
				print_r($mail->ErrorInfo);

			}



		}
	}


	if ($value['sms_durum']==0) {
		if($saat==24 || $saat==48){
			$mesaj="Sayın, {$value['tarih']} tarihindeki randevunuza $saat saat kalmıştır.";
			$numara=$value['musteri_telefon'];
			if (netgsm($numara,$mesaj)) {
				tek("UPDATE randevu SET sms_durum=1 WHERE id={$value['id']}");
			}
		}
	}

}


?>