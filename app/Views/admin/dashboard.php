<?= $this->extend('templates/admin_page_layout') ?>
<?= $this->section('content') ?>
<div class="content">
    <div class="container-fluid">
        <!-- REKAP JUMLAH DATA -->
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-primary card-header-icon">
                        <div class="card-icon">
                            <a href="<?= base_url('admin/siswa'); ?>" class="text-white">
                                <i class="material-icons">person</i>
                            </a>
                        </div>
                        <p class="card-category">Jumlah Mahasiswa</p>
                        <h3 class="card-title"><?= count($siswa); ?></h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons text-primary">check</i>
                            Terdaftar
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-success card-header-icon">
                        <div class="card-icon">
                            <a href="<?= base_url('admin/guru'); ?>" class="text-white">
                                <i class="material-icons">person_4</i>
                            </a>
                        </div>
                        <p class="card-category">Jumlah Dosen</p>
                        <h3 class="card-title"><?= count($guru); ?></h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons text-success">check</i>
                            Terdaftar
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-info card-header-icon">
                        <div class="card-icon">
                            <a href="<?= base_url('admin/kelas'); ?>" class="text-white">
                                <i class="material-icons">grade</i>
                            </a>
                        </div>
                        <p class="card-category">Jumlah Kelas</p>
                        <h3 class="card-title"><?= count($kelas); ?></h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons">home</i>
                            Sekolah Tinggi Teknologi Cipasung
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-danger card-header-icon">
                        <div class="card-icon">
                            <a href="<?= base_url('admin/petugas'); ?>" class="text-white">
                                <i class="material-icons">settings</i>
                            </a>
                        </div>
                        <p class="card-category">Jumlah Petugas</p>
                        <h3 class="card-title"><?= count($petugas); ?></h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons">person</i>
                            Petugas dan Administrator
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title"><b>Data Mahasiswa Hari Ini</b></h4>
                        <p class="card-category"><?= $dateNow; ?></p>
                    </div>
                    <div class="card-body">
                        <div class="row text-center">
                            <div class="col-md-3">
                                <h4 class="text-success"><b>Hadir</b></h4>
                                <h3><?= $jumlahKehadiranSiswa['hadir']; ?></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header card-header-success">
                        <h4 class="card-title"><b>Data Dosen Hari Ini</b></h4>
                        <p class="card-category"><?= $dateNow; ?></p>
                    </div>
                    <div class="card-body">
                        <div class="row text-center">
                            <div class="col-md-3">
                                <h4 class="text-success"><b>Hadir</b></h4>
                                <h3><?= $jumlahKehadiranGuru['hadir']; ?></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- GRAFIK CHART -->
        <div class="row">
            <div class="col-md-6">
                <div class="card card-chart">
                    <div class="card-header card-header-primary">
                        <div class="ct-chart" id="kehadiranSiswa"></div>
                    </div>
                    <div class="card-body">
                        <h4 class="card-title">Tingkat kehadiran mahasiswa</h4>
                        <p class="card-category">Jumlah kehadiran mahasiswa dalam 7 hari terakhir</p>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons text-primary">checklist</i> <a class="text-primary" href="<?= base_url('admin/absen-siswa'); ?>">Lihat data</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card card-chart">
                    <div class="card-header card-header-success">
                        <div class="ct-chart" id="kehadiranGuru"></div>
                    </div>
                    <div class="card-body">
                        <h4 class="card-title">Tingkat kehadiran dosen</h4>
                        <p class="card-category">Jumlah kehadiran dosen dalam 7 hari terakhir</p>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons text-success">checklist</i> <a class="text-success" href="<?= base_url('admin/absen-guru'); ?>">Lihat data</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Chartist JS -->
<script src="<?= base_url('public/assets/js/plugins/chartist.min.js') ?>"></script>
<script>
    $(document).ready(function() {
        initDashboardPageCharts();
    });

    function initDashboardPageCharts() {

        if ($('#kehadiranSiswa').length != 0) {
            /* ----------==========     Chart tingkat kehadiran siswa    ==========---------- */
            const dataKehadiranSiswa = [<?php foreach ($grafikKehadiranSiswa as $value) echo "$value,"; ?>];

            const chartKehadiranSiswa = {
                labels: [
                    <?php
                    foreach ($dateRange as  $value) {
                        echo "'$value',";
                    }
                    ?>
                ],
                series: [dataKehadiranSiswa]
            };

            var highestData = 0;

            dataKehadiranSiswa.forEach(e => {
                if (e >= highestData) {
                    highestData = e;
                }
            })

            const optionsChart = {
                lineSmooth: Chartist.Interpolation.cardinal({
                    tension: 0
                }),
                low: 0,
                high: highestData + (highestData / 4),
                chartPadding: {
                    top: 0,
                    right: 0,
                    bottom: 0,
                    left: 0
                }
            }

            var kehadiranSiswaChart = new Chartist.Line('#kehadiranSiswa', chartKehadiranSiswa, optionsChart);

            md.startAnimationForLineChart(kehadiranSiswaChart);
        }

        if ($('#kehadiranGuru').length != 0) {
            /* ----------==========     Chart tingkat kehadiran guru    ==========---------- */
            const dataKehadiranGuru = [<?php foreach ($grafikkKehadiranGuru as $value) echo "$value,"; ?>];

            const chartKehadiranGuru = {
                labels: [
                    <?php
                    foreach ($dateRange as  $value) {
                        echo "'$value',";
                    }
                    ?>
                ],
                series: [dataKehadiranGuru]
            };

            var highestData = 0;

            dataKehadiranGuru.forEach(e => {
                if (e >= highestData) {
                    highestData = e;
                }
            })

            const optionsChart = {
                lineSmooth: Chartist.Interpolation.cardinal({
                    tension: 0
                }),
                low: 0,
                high: highestData + (highestData / 4),
                chartPadding: {
                    top: 0,
                    right: 0,
                    bottom: 0,
                    left: 0
                }
            }

            var kehadiranGuruChart = new Chartist.Line('#kehadiranGuru', chartKehadiranGuru, optionsChart);

            md.startAnimationForLineChart(kehadiranGuruChart);
        }
    }
</script>
<?= $this->endSection() ?>