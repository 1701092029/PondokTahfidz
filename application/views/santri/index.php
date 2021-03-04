<!-- Nav Item - Pages Collapse Menu -->

<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary">Data Menu</h6>
	</div>
	<div class="card-body">

		<?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
		<?= $this->session->flashdata('messege'); ?>
		<a href="<?= base_url(); ?>santri/tambah/" class="btn btn-primary mb-3">Tambah Santri </a>

		<div class="table-responsive text-gray-900">
			<table class="table table-hover" id="dataTable" width="100%">
				<thead>
					<tr class="text-gray-900">
						<th scope="col">#</th>
						<th scope="col">nama santri</th>
						<th scope="col">jenis kelamin</th>
						<th scope="col">action</th>
					</tr>
				</thead>
				<tbody class="text-gray-900">
					<?php $i = 1 ?>
					<?php foreach ($santri as $str) : ?>
						<tr>
							<th scope="row"><?= $i++ ?></th>
							<td><?= $str['nama_santri']; ?></td>
							<td><?= $str['jk']; ?></td>

							<td>
								<a href="<?= base_url(); ?>santri/info_edit/<?= $str['id_santri']; ?>" class=" float-left  btn btn-info btn-circle mr-1"> <i class="fas fa-info-circle"></i></a>
								<a href="<?= base_url(); ?>santri/edit/<?= $str['id_santri']; ?>" class=" float-left mb-2 btn btn-success btn-circle mr-1"> <i class="far fa-edit"></i></a>
								<a href="<?= base_url(); ?>santri/hapus/<?= $str['id_santri']; ?>" class=" float-left mb-2 btn btn-danger btn-circle" onclick="return confirm('Yakin ingin menghapus data?');"> <i class="fas fa-trash"></i></a>
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