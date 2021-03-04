<!-- Nav Item - Pages Collapse Menu -->

<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary">Data Menu</h6>
	</div>
	<div class="card-body">

		<?= $this->session->flashdata('messege'); ?>
		<a href="<?= base_url(); ?>pengajar/tambah/" class="btn btn-primary mb-3">Tambah Pengajar </a>
		<div class="table-responsive text-gray-900">
			<table class="table table-hover" id="dataTable" width="100%">
				<thead>
					<tr class="text-gray-900">
						<th scope="col">#</th>
						<th scope="col">nip</th>
						<th scope="col">nama pengajar</th>
						<th scope="col">action</th>
					</tr>
				</thead>
				<tbody class="text-gray-900">
					<?php $i = 1 ?>
					<?php foreach ($pengajar as $pgjr) : ?>
						<tr>
							<th scope="row"><?= $i++ ?></th>
							<td><?= $pgjr['id_pengajar']; ?></td>
							<td><?= $pgjr['nama_pengajar']; ?></td>

							<td>
								<a href="<?= base_url(); ?>pengajar/detail/<?= $pgjr['id_pengajar']; ?>" class=" float-left  btn btn-info btn-circle mr-1"> <i class="fas fa-info-circle"></i></a>
								<a href="<?= base_url(); ?>pengajar/edit/<?= $pgjr['id_pengajar']; ?>" class=" float-left mb-2 btn btn-success btn-circle mr-1"> <i class="far fa-edit"></i></a>
								<a href="<?= base_url(); ?>pengajar/hapus/<?= $pgjr['id_pengajar']; ?>" class=" float-left mb-2 btn btn-danger btn-circle" onclick="return confirm('Yakin ingin menghapus data?');"> <i class="fas fa-trash"></i></a>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>

		<!-- /.container-fluid -->

	</div>
</div>
<!-- End of Main Content -->