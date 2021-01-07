<?= $this->extend('layout/index'); ?>

<?= $this->section('content'); ?>

<div class="container mt-3">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Beranda</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= user()->username; ?></li>
            <li class="breadcrumb-item active" aria-current="page">Riwayat</li>
        </ol>
    </nav>

    <?php foreach ($riwayat as $r) : ?>
        <div class="card text-center mb-3">
            <div class="card-header">
                <?= user()->username; ?>
            </div>
            <div class="card-body">
                <h5 class="card-title">Saya Menangkap Udang pada tanggal <?= $r['tanggal']; ?></h5>
                <p class="card-text">Pada hari itu saya mendapatkan tangkapan sebanyak <?= $r['jumlahTangkapan']; ?> Kg.</p>
            </div>
            <div class="card-footer text-muted">
                di buat pada <?= $r['created_at']; ?>
            </div>
        </div>
    <?php endforeach; ?>

</div>

<?= $this->endSection(); ?>