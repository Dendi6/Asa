<?= $this->extend('layout/index'); ?>

<?= $this->section('content'); ?>

<div class="container mt-3">
    <div class="text-center">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Tambahkan Hasil Tangkapan Hari ini
        </button>
    </div>

    <!-- sesion pemberitahuan -->
    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success mt-3" role="alert">
            <?= session()->getFlashdata('pesan'); ?>
        </div>
    <?php endif; ?>
    <?php if (session()->getFlashdata('delete')) : ?>
        <div class="alert alert-danger mt-3" role="alert">
            <?= session()->getFlashdata('delete'); ?>
        </div>
    <?php endif; ?>

    <div class="card mt-3">
        <div class="card-body">
            ashdksahdk
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Menambahkan Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('home/saveHasil'); ?>" method="POST">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="id_user" value="<?= user()->id; ?>">

                    <div class="form-group">
                        <label for="tanggal">Tanggal</label>
                        <input type="date" name="tanggal" class="form-control" id="tanggal" aria-describedby="tanggalHelp" required>
                        <small id="tanggalHelp" class="form-text text-muted">Tanggal Saat Anda Mengkap Ikan.</small>
                    </div>
                    <div class="form-group">
                        <label for="hasil">Jumlah Tangkapan</label>
                        <input type="number" name="jumlahTangkapan" class="form-control" id="hasil" aria-describedby="hasil" required>
                        <small id="hasil" class="form-text text-muted">Masukkan Hasil Tangkapan, Satuan KG. example = 0.2 kg untuk kecil dari 1 kg</small>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>