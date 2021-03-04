<!DOCTYPE html>
<html>

<head>
    <title>Cetak Transaksi</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php base_url(); ?>asset/css/style.css">
    <style>
        .line-title {
            border: 0;
            border-style: inset;
            border-top: 1px solid #000;
        }
    </style>
</head>

<body>

    <div>
        <table style="width: 100% ;">
            <tr>
                <td align="center">
                    <span style="line-height: 1.1; font-weight:bold;">
                        KOPERASI MANDANI DAN MERDEKA<br>
                    </span>
                    <small style=" font-weight:bold;">(Menyediakan Pangan Sehat, Fresh and healthy, Simple and easy to get,<br> Interconnected between producers and consumers)</small>

                </td>
            </tr>
        </table>
    </div>
    <hr class="line-title">

    <bold>Rekap Presensi Bulanan</bold><br>
    <small>
        PERIODE : <?php echo $thn ?> Bulan : <?php echo $blnnya ?><br>
    </small>
    <small>
        Waktu Cetak Laporan : <?php echo date('d-m-Y'); ?>
    </small>
    <br>
    <br>
    <br>
    <div class="form-group row">
        <div class="col-sm-4 mb-3 mb-sm-0">
            <div class="table-responsive mt-3">
                <h3> Jumlah Izin </h3>
                <table class="table table-hover text-gray-800" id="" width="100%" cellspacing="0">
                    <thead class="border-5">
                        <tr>
                            <th valign="center">#</th>
                            <th valign="center">Nama Pengajar</th>
                            <th valign="center">jumlah izin</th>
                        </tr>
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

                    </thead>

                </table>

            </div>
        </div>
    </div> <br>
    <div class="form-group row">
        <div class="col-sm-4 mb-3 mb-sm-0">
            <div class="table-responsive mt-3">
                <h3> Jumlah Sakit </h3>
                <table class="table table-hover text-gray-800" id="" width="100%" cellspacing="0">
                    <thead class="border-5">
                        <tr>
                            <th valign="center">#</th>
                            <th valign="center">Nama Pengajar</th>
                            <th valign="center">jumlah sakit</th>
                        </tr>
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
                    </thead>
                </table>
            </div>
        </div>
    </div><br>

    <div class="form-group row">
        <div class="col-sm-4 mb-3 mb-sm-0">
            <div class="table-responsive mt-3">
                <h3> Jumlah Hadir </h3>
                <table class="table table-hover text-gray-800" id="" width="100%" cellspacing="0">
                    <thead class="border-5">
                        <tr>
                            <th valign="center">#</th>
                            <th valign="center">Nama Pengajar</th>
                            <th valign="center">Total Hadir</th>
                        </tr>
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
                    </thead>
                </table>
            </div>
        </div>
    </div>



    <br><br><br><br>
    <table border="0" width="100%">
        <tr>
            <td width="35%"></td>
            <td width="35%"></td>
            <td width="30%" align="center">
                <p>Padang, <?= date('d F Y') ?></p>
                <br><br><br><br>
                <p> (ADMIN KMDM)</p>

            </td>
        </tr>

    </table>
    </small>
</body>

</html>