<?php 
require_once 'header.php';

if (isset($_POST['ekle'])) {
	$sorgu=$db->prepare("INSERT INTO randevu SET 
		baslik=:baslik,
		tarih=:tarih,
		musteri=:musteri,
		adres=:adres,
		detay=:detay,
		durum=:durum
		");
	$sonuc=$sorgu->execute(array(
		'baslik' => $_POST['baslik'],
		'tarih' => $_POST['tarih'],
		'musteri' => $_POST['musteri'],
		'adres' => $_POST['adres'],
		'detay' => $_POST['detay'],
		'durum' => $_POST['durum']
	));


	if ($sonuc) {
		header("location:randevular.php?durum=ok");
	} else {
		header("location:randevular.php?durum=no");
	}


}



?>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<h4>Randevu Ekle</h4>
				</div>
				<div class="card-body">
					<form action="" method="POST" accept-charset="utf-8">
						<div class="form-row">
							<div class="col-md-6 form-group">
								<label>Randevu Başlığı</label>
								<input type="text" class="form-control" name="baslik">
							</div>
							<div class="col-md-6 form-group">
								<label>Randevu Tarihi</label>
								<input type="text" class="form-control tarihsaat" autocomplete="off" value="" placeholder="Tarih Ve Saat Seçin" name="tarih">
							</div>
						</div>

						<div class="form-row">
							<div class="col-md-6 form-group">
								<label>Müşteri</label>
								<select name="musteri" class="form-control">
									<?php 
									$sorgu=$db->prepare("SELECT * FROM musteri");
									$sorgu->execute();
									while ($musteri=$sorgu->fetch(PDO::FETCH_ASSOC)) { ?>
										<option value="<?php echo $musteri['musteri_id'] ?>"><?php echo $musteri['musteri_isim'] ?></option>								
									<?php }

									?>
								</select>
							</div>
							<div class="col-md-6 form-group">
								<label>Randevu Adresi</label>
								<input type="text" class="form-control" name="adres">
							</div>
						</div>

						<div class="form-row">
							<div class="col-md-6 form-group">
								<label>Randevu Durumu</label>
								<select name="durum" class="form-control">
									<?php foreach (durumlar() as $key => $value): ?>
										<option value="<?php echo $key ?>"><?php echo $value ?></option>
									<?php endforeach ?>
								</select>
							</div>
						</div>

						<div class="text-center mb-3">
							<label>Diğer Bilgiler</label>
							<textarea name="detay" class="form-control" style="min-height: 10rem"></textarea>
						</div>
						<hr>
						<div class="text-center">
							<button type="submit" name="ekle" class="btn btn-primary btn-lg">Kaydet</button>
						</div>

					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<?php require_once 'footer.php'; ?>