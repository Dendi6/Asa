<?= $this->extend('admin/layout/index'); ?>

<?= $this->section('content'); ?>

<div class="mt-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('admin'); ?>">Beranda</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('admin/arahAngin'); ?>">Arah Angin</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= $title; ?></li>
        </ol>
    </nav>
</div>

<div class="card">
    <div class="card-body">
        <form action="<?= base_url('admin/updateArahAngin') ?>" method="POST">
            <?= csrf_field(); ?>
            <input type="hidden" name="id" value="<?= $arahAngin['id']; ?>">
            <div class="form-group">
                <label for="tanggal">Tanggal</label>
                <input type="date" class="form-control" id="tanggal" name="tanggal" aria-describedby="tanggal" value="<?= $arahAngin['tanggal']; ?>" required>
                <small id="tanggal" class="form-text text-muted">Masukkan tanggal penentuan</small>
            </div>
            <div class="form-group">
                <label for="arahAngin">Arah Angin</label>
                <input type="text" class="form-control" id="arahAngin" name="arahAngin" aria-describedby="arahAngin" value="<?= $arahAngin['arahAngin'] ?>" required>
                <small id="arahAngin" class="form-text text-muted">Masukkan Arah Angin</small>
            </div>
            <button type="submit" class="btn btn-primary">Update Arah Angin</button>
        </form>
    </div>
</div>
<?= $this->endSection(); ?>