<?php $this->load->view('layouts/header'); ?>

<!-- Alert -->
<div class="col-md-12">
    <?php echo $this->session->flashdata('msg'); ?>
</div>

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Jumlah Penduduk</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active">Agama</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Daftar Penduduk Menurut Agama</h3>
                        <div class="card-tools">
                            <div class="row">
                                <div>
                                    <a href="<?php echo base_url('agama/downloadFile') ?>" class="btn btn-block btn-outline-info">
                                        <i class="fas fa-download"></i>
                                        Download Data
                                    </a>
                                </div>
                                <p>&ensp;</p>
                                <div>
                                    <a href="<?php echo base_url('agama/uploadFile') ?>" class="btn btn-block btn-outline-success">
                                        <i class="fas fa-upload"></i>
                                        Upload Data
                                    </a>
                                </div>
                                <p>&ensp;</p>
                                <div>
                                    <a href="<?php echo base_url('agama/create') ?>" class="btn btn-block btn-outline-primary">
                                        <i class="fas fa-plus"></i>
                                        Tambah
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body" style="height: 100%;">
                        <form class="" action="" method="GET">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Cari berdasarkan periode</label>
                                        <input type="month" name="periode" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label>Aksi</label>
                                        <button type="submit" class="btn btn-info form-control"> Cari</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <table id="datatable" class="table table-bordered table-hover text-wrap">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kecamatan</th>
                                    <th>Periode</th>
                                    <th>Islam</th>
                                    <th>Kristen</th>
                                    <th>Katholik</th>
                                    <th>Hindu</th>
                                    <th>Buddha</th>
                                    <th>Konghucu</th>
                                    <th>Penghayat Kepercayaan</th>
                                    <th>Total Penduduk</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (count($agama) > 0) {
                                    $i = 1;
                                    foreach ($agama as $a) { ?>
                                        <tr>
                                            <td><?= $i++ ?></td>
                                            <td><?= $a->nama_kecamatan ?></td>
                                            <td><?= $a->periode ?></td>
                                            <td>
                                                <?php
                                                if ($a->islam !== null) {
                                                    echo $a->islam;
                                                } else {
                                                    echo "-";
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                if ($a->kristen !== null) {
                                                    echo $a->kristen;
                                                } else {
                                                    echo "-";
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                if ($a->katholik !== null) {
                                                    echo $a->katholik;
                                                } else {
                                                    echo "-";
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                if ($a->hindu !== null) {
                                                    echo $a->hindu;
                                                } else {
                                                    echo "-";
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                if ($a->buddha !== null) {
                                                    echo $a->buddha;
                                                } else {
                                                    echo "-";
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                if ($a->konghucu !== null) {
                                                    echo $a->konghucu;
                                                } else {
                                                    echo "-";
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                if ($a->penghayat_kepercayaan !== null) {
                                                    echo $a->penghayat_kepercayaan;
                                                } else {
                                                    echo "-";
                                                }
                                                ?>
                                            </td>
                                            <td><?= $a->total ?></td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="<?= base_url('agama/edit/' . $a->id_agama) ?>" class="btn btn-warning"><i class="fas fa-pen"></i> Edit</a>
                                                    <a href="<?= base_url('agama/destroy/' . $a->id_agama) ?>" onclick="return confirm('Yakin menghapus data tersebut?')" class="btn btn-danger"><i class="fas fa-trash"></i> Hapus</a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php    }
                                } else { ?>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</section>

<?php $this->load->view('layouts/footer'); ?>