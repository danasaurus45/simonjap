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
                        <h3 class="card-title">Edit Data Jumlah Penduduk</h3>
                    </div>
                    <!-- /.card-header -->
                    <form action="<?php echo base_url('total/update') ?>" method="POST" id="">
                        <div class="card-body">
                            <div class="form-group">
                                <div class="col-md-3">
                                    <label for="kecamatan">Kecamatan</label>
                                    <select name="kecamatan" class="form-control" id="kecamatan">
                                        <option>-- Pilih Kecamatan --</option>
                                        <?php
                                        foreach ($kecamatan as $k) :
                                            $kecamatan = $penduduk[0]->kecamatan_id;
                                            if ($kecamatan == $k->id_kecamatan) {
                                                echo '<option value="' . $kecamatan . '" selected>' . $k->nama_kecamatan . '</option>';
                                            } else {
                                                echo '<option value="' . $k->id_kecamatan . '">' . $k->nama_kecamatan . '</option>';
                                            }
                                        endforeach;
                                        ?>
                                    </select>
                                    <input type="hidden" name="id" value="<?= $penduduk[0]->id_total ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-3">
                                    <label for="jenis_kelamin">Jenis Kelamin</label>
                                    <select name="jenis_kelamin" class="form-control" id="jenis_kelamin">
                                        <option>-- Pilih Jenis Kelamin --</option>
                                        <?php
                                        $jk = $penduduk[0]->jenis_kelamin;
                                        if ($jk == 'L') {
                                            echo '
                                                <option value="L" selected>Laki - laki</option>
                                                <option value="P">Perempuan</option>
                                            ';
                                        } else {
                                            echo '
                                                <option value="L">Laki - laki</option>
                                                <option value="P" selected>Perempuan</option>
                                            ';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-3">
                                    <label for="warga_negara">Warga Negara</label>
                                    <select name="warga_negara" class="form-control" id="warga_negara">
                                        <option>-- Pilih Warga Negara --</option>
                                        <?php
                                        $wn = $penduduk[0]->warga_negara;
                                        if ($wn == 'WNI') {
                                            echo '
                                                <option value="WNI" selected>WNI</option>
                                                <option value="WNA">WNA</option>
                                            ';
                                        } else {
                                            echo '
                                                <option value="WNI">WNI</option>
                                                <option value="WNA" selected>WNA</option>
                                            ';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-3">
                                    <label for="periode">Periode</label>
                                    <input type="month" class="form-control" id="periode" name="periode" min="2021-01" max="2030-12" value="<?= $penduduk[0]->periode ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="lahir">Angka Kelahiran</label>
                                <input type="number" class="form-control" id="lahir" name="lahir" placeholder="Masukkan jumlah angka kelahiran bulan ini" value="<?= $penduduk[0]->lahir ?>">
                            </div>
                            <div class="form-group">
                                <label for="mati">Angka Kematian</label>
                                <input type="number" class="form-control" id="mati" name="mati" placeholder="Masukkan jumlah angka kematian bulan ini" value="<?= $penduduk[0]->mati ?>">
                            </div>
                            <div class="form-group">
                                <label for="pendatang">Jumlah Pendatang</label>
                                <input type="number" class="form-control" id="pendatang" name="pendatang" placeholder="Masukkan jumlah pendatang ke kota malang bulan ini" value="<?= $penduduk[0]->pendatang ?>">
                            </div>
                            <div class="form-group">
                                <label for="pindah">Jumlah Pindah</label>
                                <input type="number" class="form-control" id="pindah" name="pindah" placeholder="Masukkan jumlah pindah dari kota malang bulan ini" value="<?= $penduduk[0]->pindah ?>">
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-warning">Simpan</button>
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