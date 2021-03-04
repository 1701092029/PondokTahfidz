<div class="container">
	<div class="row mt-3">
		<div class="col-md-12 ml-0">

			<div class="card shadow mb-4 ">

				<!-- Card Header - Dropdown -->
				<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
					<h6 class="m-0 font-weight-bold text-primary">Detail Pengajar</h6>

				</div>
				<!-- Card Body -->
				<div class="card-body">


					<div class="table-responsive text-gray-800">
						<table class=border="2" width="100%" height="300">
							<tr>
								<td rowspan="2" width=50%>
									<table width="100%">

										<?= $pengajar['id_pengajar']; ?>
										<tr>
											<td>NIP</td>
											<td>:</td>
											<td><?= $pengajar['id_pengajar']; ?></td>
										</tr>

										<tr>
											<td>Nama Pengajar</td>
											<td>:</td>
											<td><?= $pengajar['nama_pengajar']; ?></td>
										</tr>

										<tr>
											<td>Tempat Lahir</td>
											<td>:</td>
											<td>
												<?= $pengajar['tempat_lahir'] ?>
											</td>
										</tr>
										<tr>
											<td>Tanggal Lahir</td>
											<td>:</td>
											<td>
												<?= $pengajar['tanggal_lahir']; ?>
											</td>
										</tr>
										<tr>
											<td>Alamat</td>
											<td>:</td>
											<td>
												<?= $pengajar['alamat']; ?>
											</td>
										</tr>
										<tr>
											<td>Tahun Masuk</td>
											<td>:</td>
											<td>
												<?= $pengajar['tahun_masuk']; ?>
											</td>
										</tr>
										<tr>
											<td>Jenis Kelamin</td>
											<td>:</td>
											<td>
												<?= $pengajar['jk']; ?>
											</td>
										</tr>
										<tr>
											<td>Status Kawin</td>
											<td>:</td>
											<td>
												<?= $pengajar['status_kawin']; ?>
											</td>
										</tr>
										<tr>
											<td>Pendidikan Terakhir</td>
											<td>:</td>
											<td>
												<?= $pengajar['pendidikan_terakhir']; ?>
											</td>
										</tr>
										<tr>
											<td>Email</td>
											<td>:</td>
											<td>
												<?= $pengajar['email']; ?>
											</td>
										</tr>
										<tr>
											<td>Nomor HP</td>
											<td>:</td>
											<td>
												<?= $pengajar['nohp']; ?>
											</td>
										</tr>
										<tr>
											<td>Tahun Masuk</td>
											<td>:</td>
											<td>
												<?= $pengajar['tahun_masuk']; ?>
											</td>
										</tr>
									</table>
								</td>
							</tr>

						</table>
					</div>


				</div>
			</div>


		</div>
	</div>
</div>



</div>
<!-- End of Main Content -->