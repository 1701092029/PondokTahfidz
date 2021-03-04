<div class="container">
	<div class="row mt-3">
		<div class="col-md-6">

			<div class="card">
				<div class="card-header">
					Form Tambah Data Pengajar
				</div>
				<div class="card-body">
					<form action="" method="post">
						<div class="form-group">
							<label for="nip">NIP</label>
							<input type="text" name="nip" class="form-control" id="nip">
							<small class="form-text text-danger"><?= form_error('nip'); ?></small>
						</div>
						<div class="form-group">
							<label for="nama_pengajar">Nama Pengajar</label>
							<input type="text" name="nama_pengajar" class="form-control" id="nama_pengajar">
							<small class="form-text text-danger"><?= form_error('nama_pengajar'); ?></small>
						</div>
						<div class="form-group">
							<label for="jk">Jenis kelamin</label>
							<select class="form-control" name="jk" id="jk">
								<option value="Laki-Laki">Laki-Laki</option>
								<option value="Perempuan">Perempuan</option>
							</select>
						</div>
						<div class="form-group">
							<label for="tempat_lahir">Tempat lahir</label>
							<input type="text" name="tempat_lahir" class="form-control" id="tempat_lahir">
							<small class="form-text text-danger"><?= form_error('tempat_lahir'); ?></small>
						</div>
						<div class="form-group">
							<label for="tanggal_lahir">Tanggal lahir</label>
							<input type="date" name="tanggal_lahir" class="form-control" id="tanggal_lahir">
							<small class="form-text text-danger"><?= form_error('tanggal_lahir'); ?></small>
						</div>
						<div class="form-group">
							<label for="alamat">Alamat</label>
							<input type="text" name="alamat" class="form-control" id="alamat">
							<small class="form-text text-danger"><?= form_error('alamat'); ?></small>
						</div>
						<div class="form-group">
							<label for="status_kawin">Status kawin</label>
							<select class="form-control" name="status_kawin" id="status_kawin">
								<option value="menikah">Menikah</option>
								<option value="belum">Belum menikah</option>
							</select>
						</div>
						<div class="form-group">
							<label for="tahun_masuk">Tahun masuk</label>
							<input type="text" name="tahun_masuk" class="form-control" id="tahun_masuk">
							<small class="form-text text-danger"><?= form_error('tahun_masuk'); ?></small>
						</div>
						<div class="form-group">
							<label for="pendidikan_terakhir">Pendidikan terakhir</label>
							<input type="text" name="pendidikan_terakhir" class="form-control" id="pendidikan_terakhir">
							<small class="form-text text-danger"><?= form_error('pendidikan_terakhir'); ?></small>
						</div>
						<div class="form-group">
							<label for="email">Email</label>
							<input type="text" name="email" class="form-control" id="email">
							<small class="form-text text-danger"><?= form_error('email'); ?></small>
						</div>
						<div class="form-group">
							<label for="nohp">No hp</label>
							<input type="text" name="nohp" class="form-control" id="nohp">
							<small class="form-text text-danger"><?= form_error('nohp'); ?></small>
						</div>
						<button type="submit" name="tambah" class="btn btn-primary float-right">Tambah Data</button>
					</form>
				</div>
			</div>

		</div>
	</div>

</div>