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
                <h1>User</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active">User</li>
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
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <a href="<?php echo base_url('users/create') ?>" class="btn btn-block btn-outline-primary">
                                    <i class="fas fa-plus"></i>
                                    Tambah
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body" style="height: 100%;">
                        <table id="datatable" class="table table-bordered table-hover text-wrap">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (count($user) > 0) {
                                    $i = 1;
                                    foreach ($user as $u) { ?>
                                        <tr>
                                            <td><?= $i++ ?></td>
                                            <td><?= $u->nama ?></td>
                                            <td><?= $u->username ?></td>
                                            <td><?= $u->email ?></td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="<?= base_url('users/edit/'.$u->id_user)?>" class="btn btn-warning"><i class="fas fa-pen"></i> Edit</a>
                                                    <a href="<?= base_url('users/destroy/'.$u->id_user)?>" onclick="return confirm('Yakin menghapus data tersebut?')" class="btn btn-danger"><i class="fas fa-trash"></i> Hapus</a>
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