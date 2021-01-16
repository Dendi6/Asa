<?= $this->extend('admin/layout/index'); ?>

<?= $this->section('content'); ?>

<div class="mt-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('admin'); ?>">Beranda</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('admin/curahHujan'); ?>">Curah Hujan</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= $title; ?></li>
        </ol>
    </nav>
</div>

<div class="card">
    <div class="card-body">
        <form action="<?= base_url('admin/updateCurahHujan') ?>" method="POST">
            <?= csrf_field(); ?>
            <input type="hidden" name="id" value="<?= $curahHujan['id']; ?>">
            <div class="form-group">
                <label for="tanggal">Tanggal</label>
                <input type="date" class="form-control" id="tanggal" name="tanggal" aria-describedby="tanggal" value="<?= $curahHujan['tanggal']; ?>" required>
                <small id="tanggal" class="form-text text-muted">Masukkan tanggal penentuan</small>
            </div>
            <div class="form-group">
                <label for="curahHujan">Curah Hujan</label>
                <input type="text" class="form-control" id="curahHujan" name="curahHujan" aria-describedby="curahHujan" value="<?= $curahHujan['curahHujan'] ?>" required>
                <small id="curahHujan" class="form-text text-muted">Masukkan jumlah curah hujan dalam satuan milimeter</small>
            </div>
            <button type="submit" class="btn btn-primary">Update Curah Hujan</button>
        </form>
    </div>
</div>
<?= $this->endSection(); ?>