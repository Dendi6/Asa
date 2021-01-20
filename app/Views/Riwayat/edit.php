<?= $this->extend('layout/index'); ?>

<?= $this->section('content'); ?>

<div class="container mt-3">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Beranda</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('profil/' . user()->id); ?>"><?= user()->username; ?></a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('home/riwayat/' . user()->id); ?>">Riwayat</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit</li>
        </ol>
    </nav>

    <div class="card">
        <div class="card-body">
            <form action="<?= base_url('home/updateRiwayat/' . $riwayat['id']) ?>" method="POST">
                <?= csrf_field(); ?>
                <div class="form-group">
                    <label for="tanggal">Tanggal</label>
                    <input type="date" name="tanggal" class="form-control" id="tanggal" value="<?= $riwayat['tanggal']; ?>" aria-describedby="tanggalHelp" required>
                    <small id="tanggalHelp" class="form-text text-muted">Tanggal Saat Anda Mengkap Ikan.</small>
                </div>
                <div class="form-group">
                    <label for="hasil">Jumlah Tangkapan</label>
                    <input type="text" name="jumlahTangkapan" class="form-control" id="hasil" value="<?= $riwayat['jumlahTangkapan']; ?> Kg" aria-describedby="hasil" required>
                    <small id="hasil" class="form-text text-muted">Masukkan Hasil Tangkapan, Satuan KG. example = 0.2 kg untuk kecil dari 1 kg</small>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

</div>

<?= $this->endSection(); ?>