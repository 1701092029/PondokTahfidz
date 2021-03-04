<!-- Nav Item - Pages Collapse Menu -->
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

<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="jamServer.js"></script>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Presensi</h6>
    </div>
    <div class="card-body">
        <!-- <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?> -->
        <?= $this->session->flashdata('messege'); ?>

        <!-- date('l, d-m-Y'); -->
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




        <form action="<?= base_url('PresensiR2/absensi'); ?>" method="POST">
            <div class="form-group">

                <input type="text" name="nim" class="form-control" id="nim" value="<?= $user['id']; ?>">
                <?= form_error('ruang_kelas', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>

            <div class="form-group">
                <input type="text" name="waktu" class="form-control" id="waktu" value="<?php date_default_timezone_set('Asia/Jakarta');
                                                                                        $date = new DateTime('now');
                                                                                        echo $date->format('H:i:s'); ?>">
                <?= form_error('ruang_kelas', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>

            <?php
            $dayList = array(
                'Sun' => 'Minggu',
                'Mon' => 'Senin',
                'Tue' => 'Selasa',
                'Wed' => 'Rabu',
                'Thu' => 'Kamis',
                'Fri' => 'Jumat',
                'Sat' => 'Sabtu'
            );

            date_default_timezone_set('Asia/Jakarta');
            $date = new DateTime('now');
            // $date->format('d-m-Y');
            ?>

            <div class="form-group">
                <input type="text" name="hari" class="form-control" id="hari" value="<?php $tanggal = $date->format('d-m-Y');
                                                                                        $day = date('D', strtotime($tanggal));
                                                                                        echo $dayList[$day]; ?>">
                <?= form_error('ruang_kelas', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <button type="submit" class="btn btn-primary float-right" name="tambah">Ambil Absen</button>
        </form>
        <a href="" class="btn btn-primary mb-3 mr-2" data-toggle="modal" data-target="#exampleModal">Tambah Menu </a>
        <button type="submit" class="btn btn-primary float-right mr-2" name="tambah" data-toggle="modal" data-target="#exampleModal">Lainnya</button>
        <!-- /.container-fluid -->

    </div>
</div>
<!-- End of Main Content -->
</div>
<!-- Modal tamah-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="<?= base_url('') ?>">
                <div class="modal-body">

                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <!-- <label for="judul">jekel </label>
                                        <input type="text" name="jekel" class="form-control" id="jekel"> -->
                            <div class="form-check form-check-inline">
                                <label for="judul">Keterangan Lain</label>
                            </div><br>

                            <div class="form-group">
                                <input type="text" name="waktu" class="form-control" id="waktu" value="<?php date_default_timezone_set('Asia/Jakarta');
                                                                                                        $date = new DateTime('now');
                                                                                                        echo $date->format('H:i:s'); ?>">
                                <?= form_error('ruang_kelas', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="pendidikan" id="pendidikan" value="">
                                <label class="form-check-label" for="inlineRadio1">Izin</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="pendidikan" id="pendidikan" value="">
                                <label class="form-check-label" for="inlineRadio1">Sakit</label>
                            </div>


                            <?= form_error('pendidikan', '<small class="text-danger pl-3">', '</small>'); ?>
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





<script type="text/javascript">
    var serverClock = jQuery("#jamServer");
    if (serverClock.length > 0) {
        showServerTime(serverClock, serverClock.text());
    }

    function showServerTime(obj, time) {
        var parts = time.split(":"),
            newTime = new Date();

        newTime.setHours(parseInt(parts[0], 10));
        newTime.setMinutes(parseInt(parts[1], 10));
        newTime.setSeconds(parseInt(parts[2], 10));

        var timeDifference = new Date().getTime() - newTime.getTime();

        var methods = {
            displayTime: function() {
                var now = new Date(new Date().getTime() - timeDifference);
                obj.text([
                    methods.leadZeros(now.getHours(), 2),
                    methods.leadZeros(now.getMinutes(), 2),
                    methods.leadZeros(now.getSeconds(), 2)
                ].join(":"));
                setTimeout(methods.displayTime, 500);
            },

            leadZeros: function(time, width) {
                while (String(time).length < width) {
                    time = "0" + time;
                }
                return time;
            }
        }
        methods.displayTime();
    }
</script>