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
                        <h3 class="card-title">Edit Data Jumlah Penduduk Menurut Umur</h3>
                    </div>
                    <!-- /.card-header -->
                    <form action="<?php echo base_url('umur/update') ?>" method="POST" id="">
                        <div class="card-body">
                            <div class="form-group">
                                <div class="col-md-3">
                                    <label for="kecamatan">Kecamatan</label>
                                    <select name="kecamatan" class="form-control" id="kecamatan">
                                        <option>-- Pilih Kecamatan --</option>
                                        <?php
                                        foreach ($kecamatan as $k) :
                                            $kecamatan = $umur[0]->kecamatan_id;
                                            if ($kecamatan == $k->id_kecamatan) {
                                                echo '<option value="' . $kecamatan . '" selected>' . $k->nama_kecamatan . '</option>';
                                            } else {
                                                echo '<option value="' . $k->id_kecamatan . '">' . $k->nama_kecamatan . '</option>';
                                            }
                                        endforeach;
                                        ?>
                                    </select>
                                    <input type="hidden" name="id" value="<?= $umur[0]->id_umur ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-3">
                                    <label for="periode">Periode</label>
                                    <input type="month" class="form-control" id="periode" name="periode" min="2021-01" max="2030-12" value="<?= $umur[0]->periode ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="umur">Data Kelompok Umur</label>
                                <div class="row">
                                    <div class="col-md-2">
                                        <input type="number" class="form-control" id="umur" name="umur0_4" placeholder="0-4 TH" value="<?= $umur[0]->umur0_4 ?>">
                                    </div>
                                    <div class="col-md-2">
                                        <input type="number" class="form-control" id="umur" name="umur5_9" placeholder="5-9 TH" value="<?= $umur[0]->umur5_9 ?>">
                                    </div>
                                    <div class="col-md-2">
                                        <input type="number" class="form-control" id="umur" name="umur10_14" placeholder="10-14 TH" value="<?= $umur[0]->umur10_14 ?>">
                                    </div>
                                    <div class="col-md-2">
                                        <input type="number" class="form-control" id="umur" name="umur15_19" placeholder="15-19 TH" value="<?= $umur[0]->umur15_19 ?>">
                                    </div>
                                    <div class="col-md-2">
                                        <input type="number" class="form-control" id="umur" name="umur20_24" placeholder="20-24 TH" value="<?= $umur[0]->umur20_24 ?>">
                                    </div>
                                    <div class="col-md-2">
                                        <input type="number" class="form-control" id="umur" name="umur25_29" placeholder="25-29 TH" value="<?= $umur[0]->umur25_29 ?>">
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-2">
                                        <input type="number" class="form-control" id="umur" name="umur30_34" placeholder="30-34 TH" value="<?= $umur[0]->umur30_34 ?>">
                                    </div>
                                    <div class="col-md-2">
                                        <input type="number" class="form-control" id="umur" name="umur35_39" placeholder="35-39 TH" value="<?= $umur[0]->umur35_39 ?>">
                                    </div>
                                    <div class="col-md-2">
                                        <input type="number" class="form-control" id="umur" name="umur40_44" placeholder="40-44 TH" value="<?= $umur[0]->umur40_44 ?>">
                                    </div>
                                    <div class="col-md-2">
                                        <input type="number" class="form-control" id="umur" name="umur45_49" placeholder="45-49 TH" value="<?= $umur[0]->umur45_49 ?>">
                                    </div>
                                    <div class="col-md-2">
                                        <input type="number" class="form-control" id="umur" name="umur50_54" placeholder="50-54 TH" value="<?= $umur[0]->umur50_54 ?>">
                                    </div>
                                    <div class="col-md-2">
                                        <input type="number" class="form-control" id="umur" name="umur55_59" placeholder="55-59 TH" value="<?= $umur[0]->umur55_59 ?>">
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-2">
                                        <input type="number" class="form-control" id="umur" name="umur60_64" placeholder="60-64 TH" value="<?= $umur[0]->umur60_64 ?>">
                                    </div>
                                    <div class="col-md-2">
                                        <input type="number" class="form-control" id="umur" name="umur65_atas" placeholder=">=65 TH" value="<?= $umur[0]->umur65_atas ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-warning">Simpan</button>
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