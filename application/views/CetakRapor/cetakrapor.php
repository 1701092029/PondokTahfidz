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
        TAHUN : <?php echo $thn ?>/<?php echo nmbulan($blnnya) ?><br>
    </small>
    <small>
        Waktu Cetak Laporan : <?php echo date('d-m-Y'); ?>
    </small>
    <br>


    <div class="form-group row">
        <div class="col-sm-4 mb-3 mb-sm-0">
            <div class="table-responsive mt-3">
                <h3> REKAP RAPOR SANTRI
                    <table class="table table-hover text-gray-800" id="" width="100%" border="1" cellspacing="0">
                        <thead>
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
                            </tr>
                            <?php
                            $start = 1;
                            $rank = 1;
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
                        </thead>
                    </table>
            </div>
        </div>
    </div><br>


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