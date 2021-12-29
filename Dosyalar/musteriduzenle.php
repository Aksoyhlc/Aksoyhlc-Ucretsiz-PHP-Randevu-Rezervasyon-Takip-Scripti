<?php 
require_once 'header.php';

$sorgu=$db->prepare("SELECT * FROM musteri WHERE musteri_id={$_GET['musteri_id']}");
$sorgu->execute();
$musteri=$sorgu->fetch(PDO::FETCH_ASSOC);
extract($musteri);


if (isset($_POST['musteriguncelle'])) {
	$sorgu=$db->prepare("UPDATE musteri SET 
		musteri_isim=:musteri_isim,
		musteri_mail=:musteri_mail,
		musteri_telefon=:musteri_telefon,
		musteri_adres=:musteri_adres,
		musteri_tc=:musteri_tc,
		musteri_detay=:musteri_detay WHERE musteri_id=:musteri_id
		");
	$sonuc=$sorgu->execute(array(
		'musteri_isim' => $_POST['musteri_isim'],
		'musteri_mail' => $_POST['musteri_mail'],
		'musteri_telefon' => $_POST['musteri_telefon'],
		'musteri_adres' => $_POST['musteri_adres'],
		'musteri_tc' => $_POST['musteri_tc'],
		'musteri_detay' => $_POST['musteri_detay'],
		'musteri_id' => $_POST['musteri_id']
	));

	
	if ($sonuc) {
		header("location:musteriler.php?durum=ok");
	} else {
		header("location:musteriler.php?durum=no");
	}
}





?>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			
			<div class="card">
				<div class="card-header">
					<h5>Müşteri Düzenleme İşlemi</h5>
				</div>
				<div class="card-body">
					<form action="" method="POST" accept-charset="utf-8">
						<div class="form-row">
							<div class="col-md-6 form-group">
								<label>İsim Soyisim</label>
								<input type="text" value="<?php echo $musteri_isim ?>" name="musteri_isim" class="form-control">
							</div>
							<div class="col-md-6 form-group">
								<label>Mail Adresi</label>
								<input type="email" value="<?php echo $musteri_mail ?>" name="musteri_mail" class="form-control">
							</div>
						</div>

						<input type="hidden" name="musteri_id" value="<?php echo $_GET['musteri_id'] ?>">

						<div class="form-row">
							<div class="col-md-6 form-group">
								<label>Telefon Numarası</label>
								<input type="text" value="<?php echo $musteri_telefon ?>" name="musteri_telefon" class="form-control">
							</div>
							<div class="col-md-6 form-group">
								<label>Adres</label>
								<input type="text" value="<?php echo $musteri_adres ?>" name="musteri_adres" class="form-control">
							</div>
						</div>

						<div class="form-row">
							<div class="col-md-6 form-group">
								<label>TC Kimlik Numarası</label>
								<input type="text" value="<?php echo $musteri_tc ?>" name="musteri_tc" class="form-control">
							</div>
						</div>

						<div class="form-row">
							<div class="col-md-12">
								<label>Müşteri Hakkında Diğer Detaylar</label>
								<textarea name="musteri_detay" class="form-control"><?php echo $musteri_detay ?></textarea>
							</div>
						</div>

						<div class="text-center mt-4">
							<button type="submit" name="musteriguncelle" class="btn btn-primary btn-lg">Kaydet</button>
						</div>

					</form>
				</div>
			</div>

		</div>
	</div>
</div>

<?php require_once 'footer.php'; ?>