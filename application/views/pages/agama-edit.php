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
                    <li class="breadcrumb-item"><a href="<?php echo base_url('agama') ?>">Agama</a></li>
                    <li class="breadcrumb-item active">Edit Jumlah Penduduk</li>
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
                <div class="card card-warning">
                    <div class="card-header">
                        <h3 class="card-title">Edit Data Jumlah Penduduk Menurut Agama</h3>
                    </div>
                    <!-- /.card-header -->
                    <form action="<?php echo base_url('agama/update') ?>" method="POST" id="">
                        <div class="card-body">
                            <div class="form-group">
                                <div class="col-md-3">
                                    <label for="kecamatan">Kecamatan</label>
                                    <select name="kecamatan" class="form-control" id="kecamatan">
                                        <option>-- Pilih Kecamatan --</option>
                                        <?php
                                        foreach ($kecamatan as $k) :
                                            $kecamatan = $agama[0]->kecamatan_id;
                                            if ($kecamatan == $k->id_kecamatan) {
                                                echo '<option value="' . $kecamatan . '" selected>' . $k->nama_kecamatan . '</option>';
                                            } else {
                                                echo '<option value="' . $k->id_kecamatan . '">' . $k->nama_kecamatan . '</option>';
                                            }
                                        endforeach;
                                        ?>
                                    </select>
                                    <input type="hidden" name="id" value="<?= $agama[0]->id_agama ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-3">
                                    <label for="periode">Periode</label>
                                    <input type="month" class="form-control" id="periode" name="periode" min="2021-01" max="2030-12" value="<?= $agama[0]->periode ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="islam">Jumlah Penduduk Islam</label>
                                <input type="number" class="form-control" id="islam" name="islam" placeholder="Masukkan jumlah penduduk beragama islam bulan ini" value="<?= $agama[0]->islam ?>">
                            </div>
                            <div class="form-group">
                                <label for="kristen">Jumlah Penduduk Kristen</label>
                                <input type="number" class="form-control" id="kristen" name="kristen" placeholder="Masukkan jumlah penduduk beragama kristen bulan ini" value="<?= $agama[0]->kristen ?>">
                            </div>
                            <div class="form-group">
                                <label for="katholik">Jumlah Penduduk Katholik</label>
                                <input type="number" class="form-control" id="katholik" name="katholik" placeholder="Masukkan jumlah penduduk beragama katholik bulan ini" value="<?= $agama[0]->katholik ?>">
                            </div>
                            <div class="form-group">
                                <label for="hindu">Jumlah Penduduk Hindu</label>
                                <input type="number" class="form-control" id="hindu" name="hindu" placeholder="Masukkan jumlah penduduk beragama hindu bulan ini" value="<?= $agama[0]->hindu ?>">
                            </div>
                            <div class="form-group">
                                <label for="buddha">Jumlah Penduduk Buddha</label>
                                <input type="number" class="form-control" id="buddha" name="buddha" placeholder="Masukkan jumlah penduduk beragama buddha bulan ini" value="<?= $agama[0]->buddha ?>">
                            </div>
                            <div class="form-group">
                                <label for="konghucu">Jumlah Penduduk Konghucu</label>
                                <input type="number" class="form-control" id="konghucu" name="konghucu" placeholder="Masukkan jumlah penduduk beragama konghucu bulan ini" value="<?= $agama[0]->konghucu ?>">
                            </div>
                            <div class="form-group">
                                <label for="penghayat_kepercayaan">Jumlah Penduduk Penghayat Kepercayaan</label>
                                <input type="number" class="form-control" id="penghayat_kepercayaan" name="penghayat_kepercayaan" placeholder="Masukkan jumlah penduduk penghayat kepercayaan bulan ini" value="<?= $agama[0]->penghayat_kepercayaan ?>">
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-warning">Simpan</button>
                            <a href="<?php echo base_url('agama') ?>" class="btn btn-info">Kembali</a>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</section>

<?php $this->load->view('layouts/footer'); ?>