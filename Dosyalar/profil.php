<?php 
require_once 'header.php';

if (isset($_POST['profilguncelle'])) {

	if (strlen($_POST['kul_sifre'])<2) {
		$sifre=$_POST['sifre'];
	} else {
		$sifre=md5($_POST['kul_sifre']);
	}




	$sorgu=$db->prepare("UPDATE kullanicilar SET 
		kul_isim=:kul_isim,
		kul_mail=:kul_mail,
		kul_sifre=:kul_sifre WHERE kul_id={$_SESSION['kul_id']}
		");
	$sonuc=$sorgu->execute(array(
		'kul_isim' => $_POST['kul_isim'],
		'kul_mail' => $_POST['kul_mail'],
		'kul_sifre' => $sifre
	));
	
	$_SESSION['kul_isim']=$_POST['kul_isim'];
	$_SESSION['kul_mail']=$_POST['kul_mail'];

	if ($sonuc) {
		header("location:profil.php?durum=ok");
	} else {
		header("location:profil.php?durum=no");
	}




}


$veri=tek("SELECT * FROM kullanicilar WHERE kul_id={$_SESSION['kul_id']}");


?>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			
			<div class="card">
				<div class="card-header">
					<h5>Profil</h5>
				</div>
				<div class="card-body">
					<form action="" method="POST" accept-charset="utf-8">
						<div class="form-row">
							<div class="col-md-6 form-group">
								<label>İsim Soyisim</label>
								<input type="text" name="kul_isim" value="<?php echo $veri['kul_isim'] ?>" class="form-control">
							</div>
							<div class="col-md-6 form-group">
								<label>Mail Adresi</label>
								<input type="email" name="kul_mail" value="<?php echo $veri['kul_mail'] ?>" class="form-control">
							</div>
							<input type="hidden" name="sifre" value="<?php echo $veri['kul_sifre'] ?>">
						</div>

						<div class="form-row">
							<div class="col-md-6 form-group">
								<label>Şifre <small>(Boş Bırakırsanız Değişmez)</small></label>
								<input type="password" name="kul_sifre" class="form-control">
							</div>
						</div>

						<div class="text-center mt-4">
							<button type="submit" name="profilguncelle" class="btn btn-primary btn-lg">Kaydet</button>
						</div>

					</form>
				</div>
			</div>

		</div>
	</div>
</div>

<?php require_once 'footer.php'; ?>