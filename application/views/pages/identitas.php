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
                    <li class="breadcrumb-item active">Identitas</li>
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
                        <h3 class="card-title">Data Identitas Penduduk</h3>
                        <div class="card-tools">
                            <div class="row">
                                <div>
                                    <a href="<?php echo base_url('identitas/downloadFile') ?>" class="btn btn-block btn-outline-info">
                                        <i class="fas fa-download"></i>
                                        Download Data
                                    </a>
                                </div>
                                <p>&ensp;</p>
                                <div>
                                    <a href="<?php echo base_url('identitas/uploadFile') ?>" class="btn btn-block btn-outline-success">
                                        <i class="fas fa-upload"></i>
                                        Upload Data
                                    </a>
                                </div>
                                <p>&ensp;</p>
                                <div>
                                    <a href="<?php echo base_url('identitas/create') ?>" class="btn btn-block btn-outline-primary">
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
                                    <th>Laki-laki Wajib KTP</th>
                                    <th>Perempuan Wajib KTP</th>
                                    <th>Sudah Rekam KTP</th>
                                    <th>Belum Rekam KTP</th>
                                    <th>Wajib Punya Akta</th>
                                    <th>Sudah Punya Akta</th>
                                    <th>Belum Punya Akta</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (count($identitas) > 0) {
                                    $i = 1;
                                    foreach ($identitas as $id) { ?>
                                        <tr>
                                            <td><?= $i++ ?></td>
                                            <td><?= $id->nama_kecamatan ?></td>
                                            <td><?= $id->periode ?></td>
                                            <td><?= $id->wajib_ktp_laki ?></td>
                                            <td><?= $id->wajib_ktp_perempuan ?></td>
                                            <td><?= $id->punya_ktp ?></td>
                                            <td>
                                                <?php 
                                                    $total = $id->total_wajib_ktp;
                                                    $sudah = $id->punya_ktp;
                                                    echo $total - $sudah;
                                                ?>
                                            </td>
                                            <td><?= $id->wajib_akta ?></td>
                                            <td><?= $id->punya_akta ?></td>
                                            <td>
                                                <?php 
                                                    $total = $id->wajib_akta;
                                                    $sudah = $id->punya_akta;
                                                    echo $total - $sudah;
                                                ?>
                                            </td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="<?= base_url('identitas/edit/' . $id->id_identitas) ?>" class="btn btn-warning"><i class="fas fa-pen"></i> Edit</a>
                                                    <a href="<?= base_url('identitas/destroy/' . $id->id_identitas) ?>" onclick="return confirm('Yakin menghapus data tersebut?')" class="btn btn-danger"><i class="fas fa-trash"></i> Hapus</a>
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