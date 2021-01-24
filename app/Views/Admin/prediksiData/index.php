<?= $this->extend('admin/layout/index'); ?>

<?= $this->section('content'); ?>

<div class="mt-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('admin'); ?>">Beranda</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= $title; ?></li>
        </ol>
    </nav>
</div>

<!-- sesion pemberitahuan -->
<?php if (session()->getFlashdata('pesan')) : ?>
    <div class="alert alert-success" role="alert">
        <?= session()->getFlashdata('pesan'); ?>
    </div>
<?php endif; ?>
<?php if (session()->getFlashdata('delete')) : ?>
    <div class="alert alert-danger" role="alert">
        <?= session()->getFlashdata('delete'); ?>
    </div>
<?php endif; ?>

<div class="card">
    <div class="card-body">
        <div class="text-center">
            <button type="button" class="btn btn-primary my-3" data-toggle="modal" data-target="#exampleModal">
                Tambah Data
            </button>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Curah Hujan</th>
                    <th scope="col">Kecepatan Angin</th>
                    <th scope="col">Arah Angin</th>
                    <th scope="col">Rata-rata Tangkapan</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>

    </div>
</div>

<!-- Modal tambah-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form class="modal-content" action="<?= base_url('admin/saveArahAngin'); ?>" method="POST">
            <?= csrf_field(); ?>
            <div class="modal-body">
                <div class="form-group">
                    <label for="tanggal">Tanggal</label>
                    <input type="date" class="form-control" id="tanggal" name="tanggal" aria-describedby="tanggal" required>
                    <small id="tanggal" class="form-text text-muted">Masukkan tanggal penentuan</small>
                </div>
                <div class="form-group">
                    <label for="curahHujan">Curah Hujan</label>
                    <input type="text" class="form-control" id="curahHujan" name="curahHujan" aria-describedby="curahHujan" required>
                    <small id="curahHujan" class="form-text text-muted">Masukkan Jumlah Curah Hujan</small>
                </div>
                <div class="form-group">
                    <label for="kecepatanAngin">Kecepatan Angin</label>
                    <input type="text" class="form-control" id="kecepatanAngin" name="kecepatanAngin" aria-describedby="kecepatanAngin" required>
                    <small id="kecepatanAngin" class="form-text text-muted">Masukkan Jumlah Kecepatan Angin</small>
                </div>
                <div class="form-group">
                    <label for="arahAngin">Arah Angin</label>
                    <input type="text" class="form-control" id="arahAngin" name="arahAngin" aria-describedby="arahAngin" required>
                    <small id="arahAngin" class="form-text text-muted">Masukkan Arah Angin padat tanggal tsb</small>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save Tiket</button>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection(); ?>