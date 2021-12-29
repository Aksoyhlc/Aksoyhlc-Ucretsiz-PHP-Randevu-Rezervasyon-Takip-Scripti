<?php require_once 'header.php' ?>


<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="card card-primary">


				<div class="card-header">
					<h5 class="text-primary font-weight-bold">Randevu Listesi</h5>
				</div>

				<div class="card-body">

					<table class="table table-bordered table-hover" id="randevular">
						<thead>
							<tr>
								<th>#</th>
								<th>Başlık</th>
								<th>Tarih</th>
								<th>İsim</th>
								<th>Telefon</th>
								<th>Mail</th>
								<th>Adres</th>
								<th>Durum</th>
								<th>İşlem</th>
							</tr>
						</thead>
						<tbody>
							
							<?php foreach (cok("SELECT * FROM randevu INNER JOIN musteri ON musteri.musteri_id=randevu.musteri") as $key => $deger): ?>
								<tr>
									<td><?php echo $deger['id'] ?></td>
									<td><?php echo $deger['baslik'] ?></td>
									<td><?php echo $deger['tarih'] ?></td>
									<td><?php echo $deger['musteri_isim'] ?></td>
									<td><?php echo $deger['musteri_telefon'] ?></td>
									<td><?php echo $deger['musteri_mail'] ?></td>
									<td><?php echo $deger['adres'] ?></td>
									<td><?php echo durumlar()[$deger['durum']] ?></td>
									<td>
										<a href="randevuduzenle.php?id=<?php echo $deger['id'] ?>" class="btn btn-success btn-sm">Düzenle</a>
										<a href="randevuduzenle.php?id=<?php echo $deger['id'] ?>" class="btn btn-danger btn-sm">Sil</a>
									</td>
								</tr>
							<?php endforeach ?>

						</tbody>
					</table>

				</div>

			</div>
		</div>
	</div>
</div>


<?php require_once 'footer.php' ?>

<script>
	$(document).ready( function () {
		$('#randevular').DataTable({
			language:tr_dil
		});
	} );
</script>