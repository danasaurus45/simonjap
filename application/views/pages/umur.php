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
                    <li class="breadcrumb-item active">Umur</li>
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
                        <h3 class="card-title">Daftar Penduduk Menurut Umur</h3>
                        <div class="card-tools">
                            <div class="row">
                                <div>
                                    <a href="<?php echo base_url('umur/downloadFile') ?>" class="btn btn-block btn-outline-info">
                                        <i class="fas fa-download"></i>
                                        Download Data
                                    </a>
                                </div>
                                <p>&ensp;</p>
                                <div>
                                    <a href="<?php echo base_url('umur/uploadFile') ?>" class="btn btn-block btn-outline-success">
                                        <i class="fas fa-upload"></i>
                                        Upload Data
                                    </a>
                                </div>
                                <p>&ensp;</p>
                                <div>
                                    <a href="<?php echo base_url('umur/create') ?>" class="btn btn-block btn-outline-primary">
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
                                    <th>0-4 TH</th>
                                    <th>5-9 TH</th>
                                    <th>10-14 TH</th>
                                    <th>15-19 TH</th>
                                    <th>20-24 TH</th>
                                    <th>25-29 TH</th>
                                    <th>30-34 TH</th>
                                    <th>35-39 TH</th>
                                    <th>40-44 TH</th>
                                    <th>45-49 TH</th>
                                    <th>50-54 TH</th>
                                    <th>55-59 TH</th>
                                    <th>60-64 TH</th>
                                    <th>>= 65 TH</th>
                                    <th>Total Penduduk</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (count($umur) > 0) {
                                    $i = 1;
                                    foreach ($umur as $u) { ?>
                                        <tr>
                                            <td><?= $i++ ?></td>
                                            <td><?= $u->nama_kecamatan ?></td>
                                            <td><?= $u->periode ?></td>
                                            <td><?= $u->umur0_4 ?></td>
                                            <td><?= $u->umur5_9 ?></td>
                                            <td><?= $u->umur10_14 ?></td>
                                            <td><?= $u->umur15_19 ?></td>
                                            <td><?= $u->umur20_24 ?></td>
                                            <td><?= $u->umur25_29 ?></td>
                                            <td><?= $u->umur30_34 ?></td>
                                            <td><?= $u->umur35_39 ?></td>
                                            <td><?= $u->umur40_44 ?></td>
                                            <td><?= $u->umur45_49 ?></td>
                                            <td><?= $u->umur50_54 ?></td>
                                            <td><?= $u->umur55_59 ?></td>
                                            <td><?= $u->umur60_64 ?></td>
                                            <td><?= $u->umur65_atas ?></td>
                                            <td><?= $u->total ?></td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="<?= base_url('umur/edit/' . $u->id_umur) ?>" class="btn btn-warning"><i class="fas fa-pen"></i> Edit</a>
                                                    <a href="<?= base_url('umur/destroy/' . $u->id_umur) ?>" onclick="return confirm('Yakin menghapus data tersebut?')" class="btn btn-danger"><i class="fas fa-trash"></i> Hapus</a>
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