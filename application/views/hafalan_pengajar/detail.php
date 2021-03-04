<?php

function nmbulan($angka)
{

    switch ($angka) {
        case 1:
            return "Januari";
            break;
        case 2:
            return "Februari";
            break;
        case 3:
            return "Maret";
            break;
        case 4:
            return "April";
            break;
        case 5:
            return "Mei";
            break;
        case 6:
            return "Juni";
            break;
        case 7:
            return "Juli";
            break;
        case 8:
            return "Agustus";
            break;
        case 9:
            return "September";
            break;
        case 10:
            return "Oktober";
            break;
        case 11:
            return "November";
            break;
        case 12:
            return "Desember";
            break;
    }
}
?>
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


                        <table width="100%" border="2">
                            <tr>
                                <td>Nama</td>
                                <td>:</td>
                                <td><?= $detail_santri['nama_santri']; ?></td>
                            </tr>

                            <tr>
                                <td>Jenis Kelamin</td>
                                <td>:</td>
                                <td><?= $detail_santri['jk']; ?></td>
                            </tr>

                            <tr>
                                <td>Jumlah Hafalan</td>
                                <td>:</td>
                                <td>
                                    <?= $detail_santri['jumlah_hafalan_sementara'] ?> Juz
                                </td>
                            </tr>

                        </table>

                        <!-- ///bagian data hafalan -->
                        <?php if ($this->session->flashdata('flash')) : ?>
                            <div class="div row mt-3">
                                <div class="col md 6">
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        Data Hafalan <?= $this->session->flashdata('flash'); ?>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        <?php endif ?>

                        <div class="mt-3">
                            <form action="" method="post" class="form-inline text-gray-800">
                                &nbsp;Tahun : &nbsp;

                                <select name="th" id="th" class="form-control mb-3">
                                    <option value="">- PILIH -</option>
                                    <?php
                                    foreach ($list_th as $t) {
                                        if ($thn == $t['th']) {
                                    ?>
                                            <option selected value="<?php echo $t['th'];  ?>"><?php echo $t['th']; ?></option>
                                        <?php
                                        } else {
                                        ?>
                                            <option value="<?php echo $t['th']; ?>"><?php echo $t['th']; ?></option>
                                    <?php
                                        }
                                    }
                                    ?>
                                </select>

                                &nbsp;Bulan : &nbsp;

                                <select name="bln" id="bln" class="form-control mb-3">
                                    <option value="">- PILIH -</option>
                                    <?php
                                    for ($i = 1; $i <= 12; $i++) {
                                        if ($blnnya == $i) {
                                    ?>
                                            <option selected value="<?= $i;  ?>"><?php echo nmbulan($i); ?></option>
                                        <?php
                                        } else {
                                        ?>

                                            <option value="<?= $i;  ?>"><?php echo nmbulan($i); ?></option>
                                        <?php } ?>
                                    <?php
                                    }

                                    ?>
                                </select>


                                &nbsp;<button type="submit" class="btn btn-primary mb-3"><i class="fa fa-search"></i> Cari</button>

                            </form>
                        </div>

                        <?php if ($thn == '') { ?>
                            &nbsp;&nbsp;<a href="<?= base_url(); ?>Hafalan/tambah/<?= $id_santri; ?>" class="btn btn-primary mb-2 mt-2" data-toggle="modal" data-target="#exampleModal2">Tambaha Hafalan </a>
                        <?php } else { ?>
                            <?php if ($blnnya == '' || $thn == '' ||  $hafalan['tanggal'] != '') { ?>
                                &nbsp;<a href="<?= base_url(); ?>Hafalan/tambah/" class="btn btn-primary mb-2 mt-2" hidden>Tambah Hafalan </a>
                            <?php } else { ?>
                                &nbsp;&nbsp;<a href="<?= base_url(); ?>Hafalan/tambah/<?= $id_santri ?>" class="btn btn-primary mb-2 mt-2" data-toggle="modal" data-target="#exampleModal1">Tambaha Hafalan </a>
                            <?php } ?>
                        <?php } ?>



                        <div class="table-responsive mt-3">
                            <table class="table table-hover text-gray-800" id="" width="100%" cellspacing="0">
                                <thead class="border-5">
                                    <tr>
                                        <th>#</th>
                                        <th>Tanggal</th>
                                        <th>Awal</th>
                                        <th>Akhir</th>
                                        <th>Hasil Akhir</th>
                                        <th>Bonus</th>
                                        <th>Action</th>
                                    <tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $start = 1;
                                    if ($blnnya == '' || $thn == '' || $hafalan['tanggal'] == '') {
                                        echo "<tr><td colspan='9' align='center'>SILAHKAN PILIH TAHUN, BULAN SECARA LENGKAP</td></tr>";
                                    } else {
                                    ?>


                                        <tr>
                                            <td><?= $start++; ?></td>
                                            <td><?= $hafalan['tanggal']; ?></td>
                                            <td><?= $hafalan['surah_mulai']; ?></td>
                                            <td><?= $hafalan['surah_selesai']; ?></td>
                                            <td><?= $hafalan['hasil_akhir']; ?> ayat</td>
                                            <td><?= $hafalan['bonus_hafalan']; ?></td>
                                            <td>
                                                <a href="<?= base_url(); ?>Hafalan/edit/<?= $hafalan['id_hafalan']; ?>" class=" float-left mb-2 btn btn-success btn-circle mr-1" data-toggle="modal" data-target="#exampleModal"> <i class="far fa-edit"></i></a>
                                                <a href="<?= base_url(); ?>Hafalan/hapus/<?= $hafalan['id_hafalan']; ?>/<?= $hafalan['id_santri']; ?>" class=" float-left mb-2 btn btn-danger btn-circle" onclick="return confirm('Yakin ingin menghapus data?');"> <i class="fas fa-trash"></i></a>
                                            </td>
                                        </tr>

                                    <?php } ?>
                                </tbody>
                            </table>

                        </div>


                    </div>
                </div>
            </div>


        </div>
    </div>
</div>



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
            <form method="POST" action="<?= base_url('Hafalan/simpan_edit/') ?>/<?= $hafalan['id_hafalan']; ?>/">
                <div class="modal-body">

                    <div class="form-group row">
                        <div class="col-sm-12 mb-3 mb-sm-0">
                            <!-- <label for="judul">jekel </label>
                                        <input type="text" name="jekel" class="form-control" id="jekel"> -->
                            <div class="form-check form-check-inline">
                                <label for="judul">Perbarui Hafalan</label>
                            </div><br>
                            <div class="form-group">
                                <label for="judul">Tanggal</label>
                                <input type="date" name="tanggal" class="form-control" id="tanggal" value="<?php date_default_timezone_set('Asia/Jakarta');
                                                                                                            $date = new DateTime('now');
                                                                                                            echo $date->format('Y-m-d');; ?>">
                                <?= form_error('tanggal', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>

                            <div class="form-group">
                                <label for="judul">Total Hafalan(perbarui jika ada kesalah):</label><br>
                                <input type="number" name="hasil_akhir1" class="form-control" id="hasil_akhir1" value="<?= $hafalan['hasil_akhir']; ?>">
                                <?= form_error('hasil_akhir1', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="judul">Setoran Hari ini</label>
                                <input type="number" name="hasil_akhir" class="form-control" id="hasil_akhir" value="">
                                <?= form_error('hasil_akhir', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="judul">Bonus (diisi kalau target akhir terpenuhi)</label>
                                <input type="text" name="bonus" class="form-control" id="bonus" value="<?= $hafalan['bonus_hafalan']; ?>">
                                <?= form_error('bonus', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="Submit" class="btn btn-primary">Setorkan</button>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>

<!-- modall tambah -->
<div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Lainnya</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="<?= base_url('Hafalan/simpan_tambah') ?>/<?= $id_santri; ?>/">
                <div class="modal-body">

                    <div class="form-group row">
                        <div class="col-sm-12 mb-3 mb-sm-0">
                            <!-- <label for="judul">jekel </label>
                                        <input type="text" name="jekel" class="form-control" id="jekel"> -->
                            <div class="form-check form-check-inline">
                                <label for="judul">Perbarui Hafalan</label>
                            </div><br>
                            <div class="form-group">
                                <label for="judul">Tanggal</label>
                                <input type="text" name="tanggal" class="form-control" id="tanggal" value="<?php date_default_timezone_set('Asia/Jakarta');
                                                                                                            $date = new DateTime('now');
                                                                                                            echo $date->format('Y-m-d');; ?>">
                                <?= form_error('tanggal', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>

                            <div class="form-group">
                                <label for="judul">Awal Hafalan:</label><br>
                                <input type="text" name="awal" class="form-control" id="awal" value="">
                                <?= form_error('awal', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="judul">Akhir Hafalan</label>
                                <input type="text" name="akhir" class="form-control" id="akhir" value="">
                                <?= form_error('akhir', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="judul">Hasil Akhir</label>
                                <input type="text" name="hasil_akhir" class="form-control" id="hasil_akhir" value="">
                                <?= form_error('hasil_akhir', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="Submit" class="btn btn-primary">Setorkan</button>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>

<!-- modall tambah kalau data di tabl hafalannya kosong -->
<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Lainnya</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="<?= base_url('Hafalan/simpan_tambah') ?>/<?= $id_santri; ?>/">
                <div class="modal-body">

                    <div class="form-group row">
                        <div class="col-sm-12 mb-3 mb-sm-0">
                            <!-- <label for="judul">jekel </label>
                                        <input type="text" name="jekel" class="form-control" id="jekel"> -->
                            <div class="form-check form-check-inline">
                                <label for="judul">Perbarui Hafalan</label>
                            </div><br>
                            <div class="form-group">
                                <label for="judul">Tanggal</label>
                                <input type="text" name="tanggal" class="form-control" id="tanggal" value="<?php date_default_timezone_set('Asia/Jakarta');
                                                                                                            $date = new DateTime('now');
                                                                                                            echo $date->format('Y-m-d');; ?>">
                                <?= form_error('tanggal', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>

                            <div class="form-group">
                                <label for="judul">Awal Hafalan:</label><br>
                                <input type="text" name="awal" class="form-control" id="awal" value="">
                                <?= form_error('awal', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="judul">Akhir Hafalan</label>
                                <input type="text" name="akhir" class="form-control" id="akhir" value="">
                                <?= form_error('akhir', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="judul">Hasil Akhir</label>
                                <input type="text" name="hasil_akhir" class="form-control" id="hasil_akhir" value="">
                                <?= form_error('hasil_akhir', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="Submit" class="btn btn-primary">Setorkan</button>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>



</div>
<!-- End of Main Content -->