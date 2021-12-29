<?php 
require_once 'header.php';

if (isset($_POST['musteriyukle'])) {
	if ($_FILES['excel_dosyasi']['error']==0) {
		$gecici_isim=$_FILES['excel_dosyasi']['tmp_name'];
		$dosya_ismi=$_FILES['excel_dosyasi']['name'];
		$sayi=rand(1000,9999);
		$isim=$sayi.$dosya_ismi;
		move_uploaded_file($gecici_isim,"gecici/$isim");

		require_once 'excel.php';

		if ( $xlsx = SimpleXLSX::parse("gecici/$isim") ) {
		


			foreach ($xlsx->rows() as $key => $satir) {
				if (count($satir)==5) {
					//echo "YÜKLENEN SATIR";
					$sorgu=$db->prepare("INSERT INTO musteri SET 
						musteri_isim=:musteri_isim,
						musteri_mail=:musteri_mail,
						musteri_telefon=:musteri_telefon,
						musteri_adres=:musteri_adres,
						musteri_tc=:musteri_tc
						");
					$sorgu->execute([
						'musteri_isim' => $satir[0],
						'musteri_mail' => $satir[1],
						'musteri_telefon' => $satir[2],
						'musteri_adres' => $satir[3],
						'musteri_tc' => $satir[4]
					]);
				} else {
					echo "EXCEL DOSYASI İÇERİĞİ HATALI";
				}


			}



			


		} else {
			echo SimpleXLSX::parseError();
		}

		unlink("gecici/$isim");


	}

}



?>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			
			<div class="card">
				<div class="card-header">
					<h5>Müşteri Yükleme İşlemi</h5>
				</div>
				<div class="card-body">
					<form action="" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
						<div class="form-row">
							<div class="col-md-6 form-group">
								<label>Excel Dosyası</label>
								<input type="file" name="excel_dosyasi" class="form-control">
							</div>
						</div>


						<div class="text-center mt-4">
							<button type="submit" name="musteriyukle" class="btn btn-primary btn-lg">Yükle</button>
						</div>

					</form>
				</div>
			</div>

		</div>
	</div>
</div>

<?php require_once 'footer.php'; ?>