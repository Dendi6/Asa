<?= $this->extend('layout/index'); ?>

<?= $this->section('content'); ?>

<div class="container mt-3">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Beranda</a></li>
            <li class="breadcrumb-item active" aria-current="page">Profil</li>
            <li class="breadcrumb-item active" aria-current="page"><?= user()->username; ?></li>
        </ol>
    </nav>

    <!-- sesion pemberitahuan -->
    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('pesan'); ?>
        </div>
    <?php endif; ?>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12 col-md-4">
                    <img src="<?= base_url(); ?>/images/profil/<?= user()->sampul; ?>" width="100%" alt="<?= user()->username; ?>">
                </div>
                <div class="col-sm-12 col-md-8">
                    <table class="table">
                        <thead>
                            <tr>
                                <th colspan="2">Informasi User</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Username</td>
                                <td><?= user()->username; ?></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td><?= user()->email; ?></td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <a href="<?= base_url('profil/edit/' . user()->id);  ?>" class="btn btn-success"><i class="fas fa-user-edit"></i></a>
                                    <a href="<?= base_url('profil/delete/' . user()->id); ?>" class="btn btn-danger" onclick="return confirm('apakah anda yakin ingin hapus ?');">
                                        <i class="fas fa-trash-alt"></i>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('home/riwayat/' . user()->id); ?>">Riwayat</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?= user()->username; ?></li>
            </ol>
        </nav>
    </div>
    <?php if ($riwayat != null) : ?>
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
    <?php endif; ?>
    <?php if ($riwayat == null) : ?>
        <div class="container text-center mt-5">
            <img src="<?= base_url(); ?>/images/empty.svg" width="400px" alt="empty">
        </div>
    <?php endif; ?>

</div>

<?= $this->endSection(); ?>