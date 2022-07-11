<?php $this->load->view('layouts/header'); ?>

<!-- Alert -->
<div class="col-md-6">
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
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Tambah Data Jumlah Penduduk Menurut Umur</h3>
                    </div>
                    <!-- /.card-header -->
                    <form action="<?php echo base_url('umur/store') ?>" method="POST" id="">
                        <div class="card-body">
                            <div class="form-group">
                                <div class="col-md-3">
                                    <label for="kecamatan">Kecamatan</label>
                                    <select name="kecamatan" class="form-control" id="kecamatan">
                                        <option>-- Pilih Kecamatan --</option>
                                        <option value="1">Blimbing</option>
                                        <option value="2">Klojen</option>
                                        <option value="3">Kedung Kandang</option>
                                        <option value="4">Sukun</option>
                                        <option value="5">Lowokwaru</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-3">
                                    <label for="periode">Periode</label>
                                    <input type="month" class="form-control" id="periode" name="periode" min="2021-01" max="2030-12">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="umur">Data Kelompok Umur</label>
                                <div class="row">
                                    <div class="col-md-2">
                                        <input type="number" class="form-control" id="umur" name="umur0_4" placeholder="0-4 TH">
                                    </div>
                                    <div class="col-md-2">
                                        <input type="number" class="form-control" id="umur" name="umur5_9" placeholder="5-9 TH">
                                    </div>
                                    <div class="col-md-2">
                                        <input type="number" class="form-control" id="umur" name="umur10_14" placeholder="10-14 TH">
                                    </div>
                                    <div class="col-md-2">
                                        <input type="number" class="form-control" id="umur" name="umur15_19" placeholder="15-19 TH">
                                    </div>
                                    <div class="col-md-2">
                                        <input type="number" class="form-control" id="umur" name="umur20_24" placeholder="20-24 TH">
                                    </div>
                                    <div class="col-md-2">
                                        <input type="number" class="form-control" id="umur" name="umur25_29" placeholder="25-29 TH">
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-2">
                                        <input type="number" class="form-control" id="umur" name="umur30_34" placeholder="30-34 TH">
                                    </div>
                                    <div class="col-md-2">
                                        <input type="number" class="form-control" id="umur" name="umur35_39" placeholder="35-39 TH">
                                    </div>
                                    <div class="col-md-2">
                                        <input type="number" class="form-control" id="umur" name="umur40_44" placeholder="40-44 TH">
                                    </div>
                                    <div class="col-md-2">
                                        <input type="number" class="form-control" id="umur" name="umur45_49" placeholder="45-49 TH">
                                    </div>
                                    <div class="col-md-2">
                                        <input type="number" class="form-control" id="umur" name="umur50_54" placeholder="50-54 TH">
                                    </div>
                                    <div class="col-md-2">
                                        <input type="number" class="form-control" id="umur" name="umur55_59" placeholder="55-59 TH">
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-2">
                                        <input type="number" class="form-control" id="umur" name="umur60_64" placeholder="60-64 TH">
                                    </div>
                                    <div class="col-md-2">
                                        <input type="number" class="form-control" id="umur" name="umur65_atas" placeholder=">=65 TH">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Tambah</button>
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