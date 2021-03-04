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
                    <h6 class="m-0 font-weight-bold text-primary">Detail Rapor</h6>

                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="table-responsive text-gray-800">


                        <!-- ///bagian data hafalan -->
                        <!-- <?php if ($this->session->flashdata('flash')) : ?>
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
                        <?php endif ?> -->

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
                        <?php if ($blnnya == '' || $thn == '') { ?>
                            &nbsp;<a target="_blank" href="" class="btn btn-danger mb-3" hidden><i class="fa fa-print"></i> Cetak</a>
                        <?php } else { ?>
                            &nbsp;<a target="_blank" href="<?= base_url(); ?>PrintPresent/PrintRapor/<?php echo $thn  ?>/<?php echo $blnnya  ?>" class="btn btn-danger mb-3"><i class="fa fa-print"></i> Cetak</a>
                        <?php } ?>

                        <!-- // ========PUTRI REVISI============= -->
                        <h2>DATA RAPOR SANTRI </h2>

                        <?php if ($blnnya == '' || $thn == '') { ?>

                        <?php } else { ?>
                            <?php
                            $rata = $total['jumlahhafalan'] / $jumsan['jumsan'];
                            ?>
                            rata rata hafalan santri : <?php echo $rata ?> ayat
                        <?php } ?>
                        <!-- // ========PUTRI REVISI============= -->



                        <div class="table-responsive mt-3">
                            <table class="table table-hover text-gray-800" id="" width="100%" cellspacing="0">
                                <thead class="border-5">
                                    <tr>
                                        <th>#</th>
                                        <th>Nama</th>
                                        <th>Awal</th>
                                        <th>Akhir</th>
                                        <th>Target</th>
                                        <th>Hasil Akhir</th>
                                        <th>Bonus</th>
                                        <th>Keterangan</th>
                                        <th>Jumlah nilai</th>
                                        <th>Ranking</th>
                                    <tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $start = 1;
                                    $rank = 1;
                                    if ($blnnya == '' || $thn == '') {
                                        echo "<tr><td colspan='9' align='center'>SILAHKAN PILIH TAHUN, BULAN SECARA LENGKAP</td></tr>";
                                    } else {
                                    ?>

                                        <?php foreach ($rapor as $rpr) : ?>
                                            <tr>
                                                <td><?= $start++; ?></td>
                                                <td><?= $rpr['namasantri']; ?></td>
                                                <td><?= $rpr['surah_mulai']; ?></td>
                                                <td><?= $rpr['surah_selesai']; ?></td>
                                                <td>200 ayat</td>
                                                <td><?= $rpr['hasil_akhir']; ?> ayat</td>
                                                <td><?= $rpr['bonus_hafalan']; ?> ayat</td>
                                                <td><?= $rpr['keterangan']; ?></td>
                                                <td><?= $rpr['rangking']; ?></td>
                                                <td><?= $rank++; ?></td>
                                            </tr>
                                        <?php endforeach ?>

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
                                <input type="text" name="tanggal" class="form-control" id="tanggal" value="<?php date_default_timezone_set('Asia/Jakarta');
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