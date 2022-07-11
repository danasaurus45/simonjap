<?php $this->load->view('layouts/header'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Dashboard</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Info boxes -->
        <h3>Data Umum</h3>
        <div class="row">
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Jumlah Penduduk</span>
                        <span class="info-box-number"><?php echo $total[0]->total ?></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-user-plus"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Penambahan bulan ini</span>
                        <span class="info-box-number">0</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-baby-carriage"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Total Kelahiran</span>
                        <span class="info-box-number"><?php echo $lahir[0]->lahir ?></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <!-- fix for small devices only -->
            <div class="clearfix hidden-md-up"></div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-skull-crossbones"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Total Kematian</span>
                        <span class="info-box-number"><?php echo $mati[0]->mati ?></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-plane-departure"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Total Perpindahan</span>
                        <span class="info-box-number"><?php echo $pindah[0]->pindah ?></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-plane-arrival"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Total Pendatang</span>
                        <span class="info-box-number"><?php echo $pendatang[0]->pendatang ?></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-house-user"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Jumlah Kepala Keluarga</span>
                        <span class="info-box-number"><?php echo $jumlah_kk[0]->jumlah_kk ?></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-user"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Jumlah User</span>
                        <span class="info-box-number"><?php echo count($user);?></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
        </div>
        <br>
        <!-- /.row -->
        <h3>Data Agama Penduduk</h3>
        <div class="row">
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-star-and-crescent"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Islam</span>
                        <span class="info-box-number"><?php echo $islam[0]->islam ?></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-cross"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Kristen</span>
                        <span class="info-box-number"><?php echo $kristen[0]->kristen ?></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->

            <!-- fix for small devices only -->
            <div class="clearfix hidden-md-up"></div>

            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-bible"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Katholik</span>
                        <span class="info-box-number"><?php echo $katholik[0]->katholik ?></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-dark elevation-1"><i class="fas fa-om"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Hindu</span>
                        <span class="info-box-number"><?php echo $hindu[0]->hindu ?></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-dharmachakra"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Buddha</span>
                        <span class="info-box-number"><?php echo $buddha[0]->buddha ?></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-yin-yang"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Konghucu</span>
                        <span class="info-box-number"><?php echo $konghucu[0]->konghucu ?></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-light elevation-1"><i class="fas fa-peace"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Penghayat Kepercayaan</span>
                        <span class="info-box-number"><?php echo $kepercayaan[0]->penghayat_kepercayaan ?></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        <br>
        <h3>Kelompok Umur Penduduk</h3>
        <div class="row">
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-info elevation-1">0-4</span>
                    <div class="info-box-content">
                        <span class="info-box-text">Jumlah</span>
                        <span class="info-box-number"><?php echo $umur0_4[0]->umur0_4 ?></span>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-info elevation-1">5-9</span>
                    <div class="info-box-content">
                        <span class="info-box-text">Jumlah</span>
                        <span class="info-box-number"><?php echo $umur5_9[0]->umur5_9 ?></span>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-info elevation-1">10-14</span>
                    <div class="info-box-content">
                        <span class="info-box-text">Jumlah</span>
                        <span class="info-box-number"><?php echo $umur10_14[0]->umur10_14 ?></span>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-info elevation-1">15-19</span>
                    <div class="info-box-content">
                        <span class="info-box-text">Jumlah</span>
                        <span class="info-box-number"><?php echo $umur15_19[0]->umur15_19 ?></span>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-info elevation-1">20-24</span>
                    <div class="info-box-content">
                        <span class="info-box-text">Jumlah</span>
                        <span class="info-box-number"><?php echo $umur20_24[0]->umur20_24 ?></span>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-info elevation-1">25-29</span>
                    <div class="info-box-content">
                        <span class="info-box-text">Jumlah</span>
                        <span class="info-box-number"><?php echo $umur25_29[0]->umur25_29 ?></span>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-info elevation-1">30-34</span>
                    <div class="info-box-content">
                        <span class="info-box-text">Jumlah</span>
                        <span class="info-box-number"><?php echo $umur30_34[0]->umur30_34 ?></span>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-info elevation-1">35-39</span>
                    <div class="info-box-content">
                        <span class="info-box-text">Jumlah</span>
                        <span class="info-box-number"><?php echo $umur35_39[0]->umur35_39 ?></span>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-info elevation-1">40-44</span>
                    <div class="info-box-content">
                        <span class="info-box-text">Jumlah</span>
                        <span class="info-box-number"><?php echo $umur40_44[0]->umur40_44 ?></span>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-info elevation-1">45-49</span>
                    <div class="info-box-content">
                        <span class="info-box-text">Jumlah</span>
                        <span class="info-box-number"><?php echo $umur45_49[0]->umur45_49 ?></span>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-info elevation-1">50-54</span>
                    <div class="info-box-content">
                        <span class="info-box-text">Jumlah</span>
                        <span class="info-box-number"><?php echo $umur50_54[0]->umur50_54 ?></span>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-info elevation-1">55-59</span>
                    <div class="info-box-content">
                        <span class="info-box-text">Jumlah</span>
                        <span class="info-box-number"><?php echo $umur55_59[0]->umur55_59 ?></span>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-info elevation-1">60-64</span>
                    <div class="info-box-content">
                        <span class="info-box-text">Jumlah</span>
                        <span class="info-box-number"><?php echo $umur60_64[0]->umur60_64 ?></span>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-info elevation-1">>=65</span>
                    <div class="info-box-content">
                        <span class="info-box-text">Jumlah</span>
                        <span class="info-box-number"><?php echo $umur65_atas[0]->umur65_atas ?></span>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <h3>Data Identitas Penduduk</h3>
        <div class="row">
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-id-card"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Sudah rekam E-KTP</span>
                        <span class="info-box-number"><?php echo $punya_ktp[0]->punya_ktp ?></span>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-id-card"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Belum rekam E-KTP</span>
                        <span class="info-box-number"><?php $wajib = $wajib_ktp[0]->total_wajib_ktp; $sudah = $punya_ktp[0]->punya_ktp; echo $wajib-$sudah ?></span>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-scroll"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Sudah ada Akta Lahir</span>
                        <span class="info-box-number"><?php echo $punya_akta[0]->punya_akta ?></span>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-scroll"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Belum ada Akta Lahir</span>
                        <span class="info-box-number"><?php $wajib = $wajib_akta[0]->wajib_akta; $sudah = $punya_akta[0]->punya_akta; echo $wajib-$sudah ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php $this->load->view('layouts/footer'); ?>