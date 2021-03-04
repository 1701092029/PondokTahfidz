<!-- Nav Item - Pages Collapse Menu -->

<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary">Data Menu</h6>
	</div>
	<div class="card-body">

		<?= $this->session->flashdata('messege'); ?>

		<div class="table-responsive text-gray-900">
			<table class="table table-hover text-gray-800" id="dataTable" width="100%" cellspacing="0">
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
								<a href="<?= base_url(); ?>PresensiR1/absensi/<?= $pgjr['id_pengajar']; ?>" class="btn btn-primary mb-3">Tambah Presensi</a>
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