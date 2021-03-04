<?php
$dayList = array(
    'Sun' => 'Minggu',
    'Mon' => 'Senin',
    'Tue' => 'Selasa',
    'Wed' => 'Rabu',
    'Thu' => 'Kamis',
    'Fri' => 'Jumat',
    'Sat' => 'Sabtu'
); ?>
<!-- Nav Item - Pages Collapse Menu -->

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Menu</h6>
    </div>
    <div class="card-body">

        <?= $this->session->flashdata('messege'); ?>


        <!-- // tambah opsi edit -->
        <?php date_default_timezone_set('Asia/Jakarta');
        $date = new DateTime('now');
        $tanggal = $date->format('d-m-Y');
        $day = date('D', strtotime($tanggal));
        $hari = $dayList[$day];
        $tanggal = $date->format('d-m-Y');
        ?>
        <h3>
            <p class="text-center mb-0"> <?= $hari ?></p>
        </h3>
        <p class="text-center mb-5"><?= $tanggal ?> / <span name="waktu " id="jamServer"><?php date_default_timezone_set('Asia/Jakarta');
                                                                                            echo  date('H:i:s'); ?></span>
        </p>




        <form action="" method="POST">
            <div class="form-group">

                <input type="text" name="nim" class="form-control" id="nim" value="<?= $id_peng; ?>" readonly>
                <?= form_error('ruang_kelas', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>

            <div class="form-group">
                <input type="text" name="waktu" class="form-control" id="waktu" value="<?php date_default_timezone_set('Asia/Jakarta');
                                                                                        $date = new DateTime('now');
                                                                                        echo $date->format('H:i:s'); ?>" hidden>
                <?= form_error('ruang_kelas', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>


            <button type="submit" class="btn btn-primary float-right" name="tambah">Ambil Absen</button>
        </form>
        <button type="submit" class="btn btn-primary float-right mr-2" name="tambah" data-toggle="modal" data-target="#exampleModal">Lainnya</button>
        <!-- // -->


        <div class="table-responsive text-gray-900">
            <table class="table table-hover" id="dataTable" width="100%">
                <thead>
                    <tr class="text-gray-900">
                        <th scope="col">#</th>
                        <th scope="col">id absen</th>
                        <th scope="col">id pengajar</th>
                        <th scope="col">Nama Pengajar</th>
                        <th scope="col">tanggal</th>
                        <th scope="col">Status Kehadiran</th>

                    </tr>
                </thead>
                <tbody class="text-gray-900">
                    <?php $i = 1 ?>
                    <?php foreach ($pengajar as $pgjr) : ?>
                        <tr>
                            <th scope="row"><?= $i++ ?></th>
                            <td><?= $pgjr['id_absen']; ?></td>
                            <td><?= $pgjr['id_pengajar']; ?></td>
                            <td><?= $pgjr['nama_pengajar']; ?></td>
                            <td><?= $pgjr['tanggal']; ?></td>
                            <td><?= $pgjr['status_kehadiran']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <!-- /.container-fluid -->

    </div>
</div>
<!-- End of Main Content -->


<!-- modall -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Lainnya</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="<?= base_url('PresensiR1/lainnya/') ?>/<?= $pgjr['id_pengajar']; ?>">
                <div class="modal-body">

                    <div class="form-group row">
                        <div class="col-sm-12 mb-3 mb-sm-0">
                            <!-- <label for="judul">jekel </label>
                                        <input type="text" name="jekel" class="form-control" id="jekel"> -->
                            <div class="form-check form-check-inline">
                                <label for="judul">Keterangan Lain</label>
                            </div><br>

                            <div class="form-group">
                                <input type="text" name="waktu" class="form-control" id="waktu" value="<?php date_default_timezone_set('Asia/Jakarta');
                                                                                                        $date = new DateTime('now');
                                                                                                        echo $date->format('H:i:s'); ?>">
                                <?= form_error('waktu', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <input type="text" name="waktu" class="form-control" id="waktu" value="<?= $pgjr['id_pengajar']; ?>">
                                <?= form_error('waktu', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status_kehadiran" id="status_kehadiran" value="Izin">
                                <label class="form-check-label" for="inlineRadio1">Izin</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status_kehadiran" id="status_kehadiran" value="Sakit">
                                <label class="form-check-label" for="inlineRadio1">Sakit</label>
                            </div>
                            <?= form_error('status_kehadiran', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="Submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>