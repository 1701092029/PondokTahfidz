<div class="container">
	<div class="row mt-3">
		<div class="col-md-12 ml-0">

			<div class="card shadow mb-4 ">

				<!-- Card Header - Dropdown -->
				<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
					<h6 class="m-0 font-weight-bold text-primary">Detail Santri</h6>

				</div>
				<!-- Card Body -->
				<div class="card-body">

					<font size=3>
						<div class="table-responsive text-gray-800">
							<table class=border="2" width="100%" height="300">
								<tr>
									<td rowspan="2" width=50%>
										<table width="100%">
											<!-- <tr>
												<td width="35%">Id Anggota</td>
												<td>:</td>
												<td><?= $santri['id_santri']; ?></td>
											</tr> -->
											<tr>
												<td>Nama Lengkap</td>
												<td>:</td>
												<td><?= $santri['nama_santri']; ?></td>
											</tr>
											<tr>
												<td>Jenis Kelamin</td>
												<td>:</td>
												<td>
													<?= $santri['jk'] ?>
												</td>
											</tr>
											<tr>
												<td>Tempat Lahir</td>
												<td>:</td>
												<td>
													<?= $santri['tempat_lahir']; ?>
												</td>
											</tr>
											<tr>
												<td>Tanggal Lahir</td>
												<td>:</td>
												<td>

													<?= $santri['tanggal_lahir']; ?>

												</td>
											</tr>
											<tr>
												<td>Alamat</td>
												<td>:</td>
												<td>
													<?= $santri['alamat']; ?>
												</td>
											</tr>
											<tr>
												<td>Tahun Masuk</td>
												<td>:</td>
												<td>
													<?= $santri['tahun_masuk']; ?>
												</td>
											</tr>
											<tr>
												<td>Nama Ayah</td>
												<td>:</td>
												<td>
													<?= $santri['nama_ayah']; ?>
												</td>
											</tr>
											<tr>
												<td>Nama Ibu</td>
												<td>:</td>
												<td>
													<?= $santri['nama_ibu']; ?>
												</td>
											</tr>
											<tr>
												<td>Pekerjaan Ayah</td>
												<td>:</td>
												<td>
													<?= $santri['pekerjaan_ayah']; ?>
												</td>
											</tr>
											<tr>
												<td>Pekerjaan Ibu</td>
												<td>:</td>
												<td>
													<?= $santri['pekerjaan_ibu']; ?>
												</td>
											</tr>
											<tr>
												<td>Kontak Ortu</td>
												<td>:</td>
												<td>
													<?= $santri['kontak_ortu']; ?>
												</td>
											</tr>
											<tr>
												<td>Email Ortu</td>
												<td>:</td>
												<td>
													<?= $santri['email_ortu']; ?>
												</td>
											</tr>

										</table>
									</td>

									<td>

										<center>
											<img src="<?= base_url('gambar/foto_santri/') . $santri['foto_santri']; ?>" class="card-img" alt="Responsive image" style="width: 80%;">
									</td>

								</tr>

							</table>
						</div>
					</font>







				</div>
			</div>


		</div>
	</div>
</div>



</div>
<!-- End of Main Content -->
