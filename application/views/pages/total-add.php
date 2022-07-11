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
                    <li class="breadcrumb-item"><a href="<?php echo base_url('total') ?>">Jumlah Penduduk</a></li>
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
                        <h3 class="card-title">Tambah Data Jumlah Penduduk</h3>
                    </div>
                    <!-- /.card-header -->
                    <form action="<?php echo base_url('total/store') ?>" method="POST" id="">
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
                                    <label for="jenis_kelamin">Jenis Kelamin</label>
                                    <select name="jenis_kelamin" class="form-control" id="jenis_kelamin">
                                        <option>-- Pilih Jenis Kelamin --</option>
                                        <option value="L">Laki - laki</option>
                                        <option value="P">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-3">
                                    <label for="warga_negara">Warga Negara</label>
                                    <select name="warga_negara" class="form-control" id="warga_negara">
                                        <option>-- Pilih Warga Negara --</option>
                                        <option value="WNI">WNI</option>
                                        <option value="WNA">WNA</option>
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
                                <label for="lahir">Angka Kelahiran</label>
                                <input type="number" class="form-control" id="lahir" name="lahir" placeholder="Masukkan jumlah angka kelahiran bulan ini">
                            </div>
                            <div class="form-group">
                                <label for="mati">Angka Kematian</label>
                                <input type="number" class="form-control" id="mati" name="mati" placeholder="Masukkan jumlah angka kematian bulan ini">
                            </div>
                            <div class="form-group">
                                <label for="pendatang">Jumlah Pendatang</label>
                                <input type="number" class="form-control" id="pendatang" name="pendatang" placeholder="Masukkan jumlah pendatang ke kota malang bulan ini">
                            </div>
                            <div class="form-group">
                                <label for="pindah">Jumlah Pindah</label>
                                <input type="number" class="form-control" id="pindah" name="pindah" placeholder="Masukkan jumlah pindah dari kota malang bulan ini">
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Tambah</button>
                            <a href="<?php echo base_url('total') ?>" class="btn btn-info">Kembali</a>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</section>

<?php $this->load->view('layouts/footer'); ?>