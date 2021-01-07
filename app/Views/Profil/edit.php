<?= $this->extend('layout/index'); ?>

<?= $this->section('content'); ?>

<div class="container mt-3">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Beranda</a></li>
            <li class="breadcrumb-item active" aria-current="page">Profil</li>
            <li class="breadcrumb-item active" aria-current="page">Edit</li>
            <li class="breadcrumb-item active" aria-current="page"><?= user()->username; ?></li>
        </ol>
    </nav>

    <div class="card">
        <div class="card-body">
            <form action="<?= base_url('profil/update/' . user()->id); ?>" method="POST" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <input type="hidden" name="sampulLama" value="<?= user()->sampul; ?>">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?= user()->email; ?>" required autofocus>
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="<?= user()->username; ?>" required>
                        </div>

                        <div class="form-group custom-file">
                            <p>Foto Profil. Foto Harus berukuran 400x400.</p>
                            <input type="file" class="custom-file-input" id="sampul" name="sampul" onchange="preview()">
                            <label class="custom-file-label" for="sampul"><?= user()->images; ?></label>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <img src="/images/profil/<?= user()->sampul; ?>" width="100%" class="img-full img-thumbnail img-preview" alt="">
                    </div>
                </div>
                <div class="text-center mt-3">
                    <button type="submit" class="btn btn-primary">Edit Profil</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- javascript preview -->
<script>
    function preview() {
        const sampul = document.querySelector('#sampul');
        const sampulLabel = document.querySelector('.custom-file-label');
        const imgPreview = document.querySelector('.img-preview');

        sampulLabel.textContent = sampul.files[0].name;

        const fileSampul = new FileReader();
        fileSampul.readAsDataURL(sampul.files[0]);

        fileSampul.onload = function(e) {
            imgPreview.src = e.target.result;
        }
    }
</script>
<?= $this->endSection(); ?>