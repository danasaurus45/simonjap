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
                <h1>Jumlah Kepala Keluarga</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?php echo base_url('totalkk') ?>">Jumlah KK</a></li>
                    <li class="breadcrumb-item active">Download Jumlah KK</li>
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
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Download File Jumlah KK</h3>
                    </div>
                    <!-- /.card-header -->
                    <form action="<?php echo base_url('totalkk/spreadsheet_download') ?>" method="POST" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="periode">Pilih Periode</label>
                                <div class="col-md-4">
                                    <input type="month" class="form-control" id="periode" name="periode">
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-info">Download</button>
                            <a href="<?php echo base_url('totalkk') ?>" class="btn btn-warning">Kembali</a>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</section>

<?php $this->load->view('layouts/footer'); ?>