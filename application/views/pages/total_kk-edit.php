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
                <h1>Jumlah Kepala Keluarga</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?php echo base_url('totalkk') ?>">Jumlah KK</a></li>
                    <li class="breadcrumb-item active">Edit Jumlah KK</li>
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
                        <h3 class="card-title">Edit Data Jumlah KK</h3>
                    </div>
                    <!-- /.card-header -->
                    <form action="<?php echo base_url('totalkk/update') ?>" method="POST" id="">
                        <div class="card-body">
                            <div class="form-group">
                                <div class="col-md-3">
                                    <label for="kecamatan">Kecamatan</label>
                                    <select name="kecamatan" class="form-control" id="kecamatan">
                                        <option>-- Pilih Kecamatan --</option>
                                        <?php
                                        foreach ($kecamatan as $k) :
                                            $kecamatan = $total_kk[0]->kecamatan_id;
                                            if ($kecamatan == $k->id_kecamatan) {
                                                echo '<option value="' . $kecamatan . '" selected>' . $k->nama_kecamatan . '</option>';
                                            } else {
                                                echo '<option value="' . $k->id_kecamatan . '">' . $k->nama_kecamatan . '</option>';
                                            }
                                        endforeach;
                                        ?>
                                    </select>
                                    <input type="hidden" name="id" value="<?= $total_kk[0]->id_totalkk ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-3">
                                    <label for="periode">Periode</label>
                                    <input type="month" class="form-control" id="periode" name="periode" min="2021-01" max="2030-12" value="<?= $total_kk[0]->periode ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="jumlah_kk">Jumlah Kepala Keluarga</label>
                                <input type="number" class="form-control" id="jumlah_kk" name="jumlah_kk" placeholder="Masukkan jumlah kepala keluarga bulan ini" value="<?= $total_kk[0]->jumlah_kk ?>">
                            </div>
                            <div class="form-group">
                                <label for="penduduk">Jumlah Penduduk</label>
                                <div class="row">
                                    <div class="col-md-2">
                                        <input type="number" class="form-control" id="penduduk" name="laki" placeholder="Laki - laki" value="<?= $total_kk[0]->l ?>">
                                    </div>
                                    <div class="col-md-2">
                                        <input type="number" class="form-control" id="penduduk" name="perempuan" placeholder="Perempuan" value="<?= $total_kk[0]->p ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-warning">Simpan</button>
                            <a href="<?php echo base_url('totalkk') ?>" class="btn btn-info">Kembali</a>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</section>

<?php $this->load->view('layouts/footer'); ?>