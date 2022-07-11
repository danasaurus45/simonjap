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
                    <li class="breadcrumb-item"><a href="<?php echo base_url('umur') ?>">Umur</a></li>
                    <li class="breadcrumb-item active">Tambah Jumlah Penduduk</li>
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
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">Upload File Jumlah Penduduk Menurut Umur</h3>
                    </div>
                    <!-- /.card-header -->
                    <form action="<?php echo base_url('umur/spreadsheet_import') ?>" method="POST" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="form-group">
                                <div class="col-md-4">
                                    <a href="<?php echo base_url('umur/spreadsheet_format_download') ?>" class="btn btn-primary">Format File</a>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="upload_file">Upload file .xlsx</label>
                                <input type="file" class="form-control" id="upload_file" name="upload_file" required>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-success">Upload</button>
                            <a href="<?php echo base_url('umur') ?>" class="btn btn-info">Kembali</a>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</section>

<?php $this->load->view('layouts/footer'); ?>