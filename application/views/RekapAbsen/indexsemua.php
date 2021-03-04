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
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Rekap Absensi Pengajar</h6>
    </div>
    <div class="card-body">

        <?php
        $d = 28;
        $y = 7;
        $m = $d / $y;
        echo $m . 'tanggal akhir =';

        $hari_ini = date("Y-m-d");
        $tgl_ahir = date('Y-m-t', strtotime($hari_ini));
        echo $tgl_ahir;

        ?>
        <br>
        <?php
        $begin = new DateTime('2020-02-01');
        $end = new DateTime('2020-02-29');

        $daterange     = new DatePeriod($begin, new DateInterval('P1D'), $end);
        //mendapatkan range antara dua tanggal dan di looping
        $i = 0;
        $x     =    0;
        $end     =    1;

        foreach ($daterange as $date) {
            $daterange     = $date->format("Y-m-d");
            $datetime     = DateTime::createFromFormat('Y-m-d', $daterange);

            //Convert tanggal untuk mendapatkan nama hari
            $day         = $datetime->format('D');

            //Check untuk menghitung yang bukan hari sabtu dan minggu
            if ($day != "Sun") {
                //echo $i;
                $x    +=    $end - $i;
            }
            $end++;
            $i++;
        }
        echo "Jumlah hari selain hari libur adalah " . $x;

        ?>
        <br>

        <?php

        function selisihHari($tglAwal, $tglAkhir)
        {
            // list tanggal merah selain hari minggu
            $tglLibur = array("2013-01-04", "2013-01-05", "2013-01-17");

            // memecah string tanggal awal untuk mendapatkan
            // tanggal, bulan, tahun
            $pecah1 = explode("-", $tglAwal);
            $date1 = $pecah1[2];
            $month1 = $pecah1[1];
            $year1 = $pecah1[0];

            // memecah string tanggal akhir untuk mendapatkan
            // tanggal, bulan, tahun
            $pecah2 = explode("-", $tglAkhir);
            $date2 = $pecah2[2];
            $month2 = $pecah2[1];
            $year2 =  $pecah2[0];

            // mencari selisih hari dari tanggal awal dan akhir
            $jd1 = GregorianToJD($month1, $date1, $year1);
            $jd2 = GregorianToJD($month2, $date2, $year2);

            $selisih = $jd2 - $jd1;

            // proses menghitung tanggal merah dan hari minggu
            // di antara tanggal awal dan akhir
            $libur1 = 0;
            $libur2 = 0;
            for ($i = 1; $i <= $selisih; $i++) {
                // menentukan tanggal pada hari ke-i dari tanggal awal
                $tanggal = mktime(0, 0, 0, $month1, $date1 + $i, $year1);
                $tglstr = date("Y-m-d", $tanggal);

                // menghitung jumlah tanggal pada hari ke-i
                // yang masuk dalam daftar tanggal merah selain minggu
                if (in_array($tglstr, $tglLibur)) {
                    $libur1++;
                }

                // menghitung jumlah tanggal pada hari ke-i
                // yang merupakan hari minggu
                if ((date("N", $tanggal) == 7)) {
                    $libur2++;
                }
            }

            // menghitung selisih hari yang bukan tanggal merah dan hari minggu
            return $selisih  - $libur2;
        }


        $tgl1 = "2020-02-01";
        $tgl2 = "2020-02-29";

        // output -> "Selisih hari dari tanggal 2013-01-01 dan 2013-01-31 adalah: 23 hari"
        echo "Selisih hari dari tanggal " . $tgl1 . " dan " . $tgl2 . " adalah: " . selisihHari($tgl1, $tgl2) . " hari";

        ?>



        <?php if ($this->session->flashdata('flash')) : ?>
            <div class="div row mt-3">
                <div class="col md 6">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        Data Transaksi <?= $this->session->flashdata('flash'); ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
        <?php endif ?>


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
                foreach ($list_bln as $t) {
                    if ($blnnya == $t['bln']) {
                ?>
                        <option selected value="<?php $t['bln'];  ?>"><?php echo nmbulan($t['bln']); ?></option>
                    <?php
                    } else {
                    ?>
                        <option value="<?php echo $t['bln']; ?>"><?php echo nmbulan($t['bln']); ?></option>
                <?php
                    }
                }
                ?>
            </select>


            &nbsp;<button type="submit" class="btn btn-primary mb-3"><i class="fa fa-search"></i> Cari</button>
            <?php if ($blnnya == '' || $thn == '') { ?>
                &nbsp;<a target="_blank" href="" class="btn btn-danger mb-3" hidden><i class="fa fa-print"></i> Cetak</a>
            <?php } else { ?>
                &nbsp;<a target="_blank" href="<?= base_url(); ?>PrintPresent/PrintSemua/<?php echo $thn  ?>/<?php echo $blnnya  ?>" class="btn btn-danger mb-3"><i class="fa fa-print"></i> Cetak</a>
            <?php } ?>
        </form>

        <?php if ($blnnya == '' || $thn == '') {
            echo "<tr><td colspan='9' align='center'>SILAHKAN PILIH TAHUN, BULAN DAN PENGAJAR  SECARA LENGKAP</td></tr>";
        } else { ?>

            <div class="form-group row">
                <div class="col-sm-4 mb-3 mb-sm-0">
                    <div class="table-responsive mt-3">
                        <table class="table table-hover text-gray-800" id="" width="100%" cellspacing="0">
                            <thead class="border-5">
                                <tr class="table-primary ">
                                <tr>
                                    <th valign="center">#</th>
                                    <th valign="center">Nama Pengajar</th>
                                    <th valign="center">jumlah izin</th>
                                <tr>
                            </thead>
                            <tbody>
                                <?php
                                $start = 1;
                                ?>
                                <?php foreach ($jum_izin as $izin) : ?>
                                    <tr>
                                        <td><?= $start++; ?></td>
                                        <td><?= $izin['nama_pengajar']; ?></td>
                                        <td><?= $izin['jumizin']; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>

                    </div>


                </div>
                <div class="col-sm-4 mb-3 mb-sm-0">
                    <div class="table-responsive mt-3">
                        <table class="table table-hover text-gray-800" id="" width="100%" cellspacing="0">
                            <thead class="border-5">
                                <tr class="table-primary ">
                                <tr>
                                    <th valign="center">#</th>
                                    <th valign="center">Nama Pengajar</th>
                                    <th valign="center">jumlah sakit</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $start = 1;
                                ?>
                                <?php foreach ($jum_sakit as $sakit) : ?>
                                    <!--  -->
                                    <?php if ($sakit['nama_pengajar'] !== '') { ?>
                                        <tr>
                                            <td><?= $start++; ?></td>
                                            <td><?= $sakit['nama_pengajar']; ?></td>
                                            <td><?= $sakit['jumsakit']; ?></td>
                                        </tr>
                                    <?php } else { ?>
                                        <td colspan="3">0</td>
                                    <?php } ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="col-sm-4 mb-3 mb-sm-0">
                    <div class="table-responsive mt-3">
                        <table class="table table-hover text-gray-800" id="" width="100%" cellspacing="0">
                            <thead class="border-5">
                                <tr class="table-primary ">
                                <tr>
                                    <th valign="center">#</th>
                                    <th valign="center">Nama Pengajar</th>
                                    <th valign="center">jumlah hadir</th>

                                <tr>
                            </thead>
                            <tbody>
                                <?php
                                $start = 1;
                                ?>
                                <?php foreach ($jum_hadir as $hadir) : ?>
                                    <!--  -->
                                    <?php if ($hadir['nama_pengajar'] !== '') { ?>
                                        <tr>
                                            <td><?= $start++; ?></td>
                                            <td><?= $hadir['nama_pengajar']; ?></td>
                                            <td><?= $hadir['tot_hadir']; ?></td>
                                        </tr>
                                    <?php } else { ?>
                                        <td colspan="3">0</td>
                                    <?php } ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>

                    </div>
                </div>

            </div>



        <?php } ?>

    </div>

</div>
</div>