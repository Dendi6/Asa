<?= $this->extend('layout/index'); ?>

<?= $this->section('content'); ?>

<div class="container mt-3">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Beranda</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('profil/' . user()->id); ?>"><?= user()->username; ?></a></li>
            <li class="breadcrumb-item active" aria-current="page">Riwayat</li>
        </ol>
    </nav>

    <?php if ($riwayat != null) : ?>
        <?php foreach ($riwayat as $r) : ?>
            <div class="card text-center mb-3">
                <div class="card-header">
                    <?= user()->username; ?>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Saya Menangkap Udang pada tanggal <?= $r['tanggal']; ?></h5>
                    <p class="card-text">Pada hari itu saya mendapatkan tangkapan sebanyak <?= $r['jumlahTangkapan']; ?> Kg.</p>
                    <p>
                        <a href="<?= base_url('home/editRiwayat/' . $r['id']); ?>" class="btn btn-success">
                            <i class="fas fa-edit fa-cog"></i>
                        </a>
                        <a href="<?= base_url('home/hapusRiwayat/' . $r['id']); ?>" class="btn btn-danger">
                            <i class="fas fa-trash-alt fa-cog"></i>
                        </a>
                    </p>
                </div>
                <div class="card-footer text-muted">
                    di buat pada <?= $r['created_at']; ?>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
    <?php if ($riwayat == null) : ?>
        <div class="container text-center mt-5">
            <img src="<?= base_url(); ?>/images/empty.svg" width="400px" alt="empty">
        </div>
    <?php endif; ?>
</div>

<?= $this->endSection(); ?>