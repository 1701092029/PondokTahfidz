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
    <div>
        Total Izin : <?php echo $jum_izin ?><br>
        Total Sakit : <?php echo $jum_sakit ?><br>
        Total Alpa : <?php echo $tgl_akhir_bulan_ini - $tot_alpa ?><br>
        Total Kehadiran : <?php echo $tot_hadir ?><br>
        <table width="100%" cellspacing="0" class="mt-3" border="3">
            <thead>
                <tr>
                    <td>No</td>
                    <td>ID ABSEN</td>
                    <td>NAMA</td>
                    <td>TANGGAL</td>
                    <td>KETERANGAN</td>
                </tr>
                <?php $start = 1; ?>
                <?php foreach ($rekapabsen as $RAbsen) : ?>
                    <tr>
                        <td><?= $start++; ?></td>
                        <td><?= $RAbsen['id_absen']; ?></td>
                        <td><?= $RAbsen['nama_pengajar']; ?></td>
                        <td><?= $RAbsen['tanggal']; ?></td>
                        <td><?= $RAbsen['status_kehadiran']; ?></td>
                    </tr>
                <?php endforeach ?>
            </thead>

        </table>
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