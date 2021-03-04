<!-- Begin Page Content -->
<div class="container-fluid">

	<div class="container">
		<div class="row mt-3">
			<div class="col-md-8">
				<div class="card">
					<div class="card-header">
						<h6 class="m-0 font-weight-bold text-primary">Edit Santri</h6>
					</div>
					<div class="card-body">
						<?php echo form_open_multipart(''); ?>
						<input type="hidden" name="id" class="form-control" id="id" value="<?= $santri['id_santri'] ?>">

						<div class="form-group">
							<label for="judul">Nama santri</label>
							<input type="text" name="nama_santri" class="form-control" id="nama_santri" value="<?= $santri['nama_santri'] ?>">
							<?= form_error('nama_santri', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>
						<!-- <div class="form-group">
							<label for="judul">Jenis kelamin</label>
							<input type="text" name="jk" class="form-control" id="jk" value="<?= $santri['jk'] ?>">
							<?= form_error('jk', '<small class="text-danger pl-3">', '</small>'); ?>
						</div> -->
						<div class="form-group">
							<label for="jk">Jenis kelamin</label>
							<select class="form-control" name="jk" id="jk">
								<?php foreach ($jk as $j) : ?>
									<?php if ($j == $santri['jk']) : ?>
										<option value="<?= $j ?>" selected> <?= $j ?></option>
									<?php else : ?>
										<option value="<?= $j ?>"> <?= $j ?></option>
									<?php endif; ?>
								<?php endforeach; ?>
							</select>
							<?= form_error('jk', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>
						<div class="form-group">
							<label for="judul">Tempat Lahir</label>
							<input type="text" name="tempat_lahir" class="form-control" id="tempat_lahir" value="<?= $santri['tempat_lahir'] ?>">
							<?= form_error('tempat_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>
						<div class="form-group">
							<label for="judul">Tanggal Lahir</label>
							<input type="date" name="tanggal_lahir" class="form-control" id="tanggal_lahir" value="<?= $santri['tanggal_lahir'] ?>">
							<?= form_error('tanggal_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>
						<div class="form-group">
							<label for="judul">Alamat</label>
							<input type="text" name="alamat" class="form-control" id="alamat" value="<?= $santri['alamat'] ?>">
							<?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>
						<div class="form-group">
							<label for="judul">Tahun Masuk</label>
							<input type="text" name="tahun_masuk" class="form-control" id="tahun_masuk" value="<?= $santri['tahun_masuk'] ?>">
							<?= form_error('tahun_masuk', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>
						<div class="form-group">
							<label for="judul">Nama Ayah</label>
							<input type="text" name="nama_ayah" class="form-control" id="nama_ayah" value="<?= $santri['nama_ayah'] ?>">
							<?= form_error('nama_ayah', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>
						<div class="form-group">
							<label for="judul">Pekerjaan Ayah</label>
							<input type="text" name="pekerjaan_ayah" class="form-control" id="pekerjaan_ayah" value="<?= $santri['pekerjaan_ayah'] ?>">
							<?= form_error('pekerjaan_ayah', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>
						<div class="form-group">
							<label for="judul">Nama Ibu</label>
							<input type="text" name="nama_ibu" class="form-control" id="nama_ibu" value="<?= $santri['nama_ibu'] ?>">
							<?= form_error('nama_ibu', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>
						<div class="form-group">
							<label for="judul">Pekerjaan Ibu</label>
							<input type="text" name="pekerjaan_ibu" class="form-control" id="pekerjaan_ibu" value="<?= $santri['pekerjaan_ibu'] ?>">
							<?= form_error('pekerjaan_ibu', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>
						<div class="form-group">
							<label for="judul">Kontak Ortu</label>
							<input type="text" name="kontak_ortu" class="form-control" id="kontak_ortu" value="<?= $santri['kontak_ortu'] ?>">
							<?= form_error('kontak_ortu', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>
						<div class="form-group">
							<label for="judul">Email Ortu</label>
							<input type="text" name="email_ortu" class="form-control" id="email_ortu" value="<?= $santri['email_ortu'] ?>">
							<?= form_error('email_ortu', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>
						<div class="form-group">
							<label for="pengajar">Nama Pengajar</label>
							<select class="form-control" name="pengajar" id="pengajar">
								<?php foreach ($pengajar1 as $p) : ?>

									die; ?>
									<?php if ($p['id_pengajar'] == $santri['id_pengajar']) : ?>
										<option value="<?= $p['id_pengajar']  ?>" selected> <?= $p['nama_pengajar']  ?></option>
									<?php else : ?>
										<option value="<?= $p['id_pengajar']  ?>"> <?= $p['nama_pengajar']  ?></option>
									<?php endif; ?>
								<?php endforeach; ?>
							</select>
						</div>
						<label>Foto</label><br>
						<div class="form-group row">
							<div class="col-sm-12">
								<div class="row">
									<div class="col-sm-3">
										<img src="<?php echo base_url('/gambar/foto_santri/') . $santri['foto_santri']; ?>" class="img-thumbnail">
									</div>
									<div class="col-sm-9">
										<div class="custom-file">
											<input type="file" class="custom-file-input mb3" id="foto_santri" name="foto_santri" size="20" value="<?= $santri['foto_santri'] ?>">
											<label class=" custom-file-label" for="foto_santri">Choose file</label>
										</div>
									</div>
								</div>
							</div>
						</div>

						<button type="submit" class="btn btn-primary float-right" name="tambah">simpan</button>
						<button type="reset" class="btn btn-danger float-right mr-3" name="tambah">reset data</button>

					</div>
				</div>

			</div>
		</div>

	</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->