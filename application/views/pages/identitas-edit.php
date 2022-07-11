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
                    <li class="breadcrumb-item"><a href="<?php echo base_url('identitas') ?>">Identitas</a></li>
                    <li class="breadcrumb-item active">Edit Jumlah Identitas</li>
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
                        <h3 class="card-title">Edit Data Jumlah Identitas Penduduk</h3>
                    </div>
                    <!-- /.card-header -->
                    <form action="<?php echo base_url('identitas/update') ?>" method="POST" id="">
                        <div class="card-body">
                            <div class="form-group">
                                <div class="col-md-3">
                                    <label for="kecamatan">Kecamatan</label>
                                    <select name="kecamatan" class="form-control" id="kecamatan">
                                        <option>-- Pilih Kecamatan --</option>
                                        <?php
                                        foreach ($kecamatan as $k) :
                                            $kecamatan = $identitas[0]->kecamatan_id;
                                            if ($kecamatan == $k->id_kecamatan) {
                                                echo '<option value="' . $kecamatan . '" selected>' . $k->nama_kecamatan . '</option>';
                                            } else {
                                                echo '<option value="' . $k->id_kecamatan . '">' . $k->nama_kecamatan . '</option>';
                                            }
                                        endforeach;
                                        ?>
                                    </select>
                                    <input type="hidden" name="id" value="<?= $identitas[0]->id_identitas ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-3">
                                    <label for="periode">Periode</label>
                                    <input type="month" class="form-control" id="periode" name="periode" min="2021-01" max="2030-12" value="<?= $identitas[0]->periode ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="wajib_ktp">Wajib Memiliki E-KTP</label>
                                <div class="row">
                                    <div class="col-md-2">
                                        <input type="number" class="form-control" id="wajib_ktp" name="laki" placeholder="Laki - laki" value="<?= $identitas[0]->wajib_ktp_laki ?>">
                                    </div>
                                    <div class="col-md-2">
                                        <input type="number" class="form-control" id="wajib_ktp" name="perempuan" placeholder="Perempuan" value="<?= $identitas[0]->wajib_ktp_perempuan ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="punya_ktp">Sudah Rekam E-KTP</label>
                                <input type="number" class="form-control" id="punya_ktp" name="punya_ktp" placeholder="Masukkan jumlah penduduk yang sudah rekam E-KTP bulan ini" value="<?= $identitas[0]->punya_ktp ?>">
                            </div>
                            <div class="form-group">
                                <label for="wajib_akta">Wajib Memiliki Akta Kelahiran</label>
                                <input type="number" class="form-control" id="wajib_akta" name="wajib_akta" placeholder="Masukkan jumlah penduduk yang wajib memiliki Akta Kelahiran bulan ini" value="<?= $identitas[0]->wajib_akta ?>">
                            </div>
                            <div class="form-group">
                                <label for="punya_akta">Sudah Memiliki Akta Kelahiran</label>
                                <input type="number" class="form-control" id="punya_akta" name="punya_akta" placeholder="Masukkan jumlah penduduk yang sudah memiliki Akta Kelahiran bulan ini" value="<?= $identitas[0]->punya_akta ?>">
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-warning">Simpan</button>
                            <a href="<?php echo base_url('identitas') ?>" class="btn btn-info">Kembali</a>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</section>

<?php $this->load->view('layouts/footer'); ?>