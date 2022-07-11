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
                    <li class="breadcrumb-item active">Jumlah Penduduk</li>
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
                        <h3 class="card-title">Daftar User</h3>
                        <div class="card-tools">
                            <div class="row">
                                <div>
                                    <a href="<?php echo base_url('total/downloadFile') ?>" class="btn btn-block btn-outline-info">
                                        <i class="fas fa-download"></i>
                                        Download Data
                                    </a>
                                </div>
                                <p>&ensp;</p>
                                <div>
                                    <a href="<?php echo base_url('total/uploadFile') ?>" class="btn btn-block btn-outline-success">
                                        <i class="fas fa-upload"></i>
                                        Upload Data
                                    </a>
                                </div>
                                <p>&ensp;</p>
                                <div>
                                    <a href="<?php echo base_url('total/create') ?>" class="btn btn-block btn-outline-primary">
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
                                    <th>Jenis Kelamin</th>
                                    <th>Warga Negara</th>
                                    <th>Periode</th>
                                    <th>Jumlah Kelahiran</th>
                                    <th>Jumlah Kematian</th>
                                    <th>Jumlah Pendatang</th>
                                    <th>Jumlah Perpindahan</th>
                                    <th>Total Penduduk</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (count($penduduk) > 0) {
                                    $i = 1;
                                    foreach ($penduduk as $p) { ?>
                                        <tr>
                                            <td><?= $i++ ?></td>
                                            <td><?= $p->nama_kecamatan ?></td>
                                            <td><?= $p->jenis_kelamin ?></td>
                                            <td><?= $p->warga_negara ?></td>
                                            <td><?= $p->periode ?></td>
                                            <td>
                                                <?php
                                                if ($p->lahir !== null) {
                                                    echo $p->lahir;
                                                } else {
                                                    echo "-";
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                if ($p->mati !== null) {
                                                    echo $p->mati;
                                                } else {
                                                    echo "-";
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                if ($p->pendatang !== null) {
                                                    echo $p->pendatang;
                                                } else {
                                                    echo "-";
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                if ($p->pindah !== null) {
                                                    echo $p->pindah;
                                                } else {
                                                    echo "-";
                                                }
                                                ?>
                                            </td>
                                            <td><?= $p->total ?></td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="<?= base_url('total/edit/' . $p->id_total) ?>" class="btn btn-warning"><i class="fas fa-pen"></i> Edit</a>
                                                    <a href="<?= base_url('total/destroy/' . $p->id_total) ?>" onclick="return confirm('Yakin menghapus data tersebut?')" class="btn btn-danger"><i class="fas fa-trash"></i> Hapus</a>
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