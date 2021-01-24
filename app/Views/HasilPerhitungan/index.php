<?= $this->extend('layout/index'); ?>

<?= $this->section('content'); ?>

<div class="container mt-3">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Beranda</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= $title; ?></li>
        </ol>
    </nav>

    <div class="card mt-3">
        <div class="card-body">
            <div class="text-center">
                <h5>Hasil Perhitungan</h5>
            </div>
            <table class="table table-bordered mt-3">
                <thead>
                    <tr>
                        <th scope="col" colspan="3">Hasil Probabilty Yes</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <tr>
                        <td>P ( Yes ) </td>
                        <td><?= $array['p_yes']; ?> / <?= $array['total']; ?></td>
                        <td><?= $array['p_yes'] / $array['total']; ?></td>
                    </tr>
                    <tr>
                        <td>P ( cuaca = <?= $array['cuaca']; ?> | hasil = yes )</td>
                        <td><?= $array['cuaca_yes']; ?> / <?= $array['p_yes']; ?></td>
                        <td><?= $array['cuaca_yes'] / $array['p_yes']; ?></td>
                    </tr>
                    <tr>
                        <td>P ( kecepatan angin = <?= $array['kecepatanAngin']; ?> | hasil = yes )</td>
                        <td><?= $array['kecepatanAngin_yes']; ?> / <?= $array['p_yes']; ?></td>
                        <td><?= $array['kecepatanAngin_yes'] / $array['p_yes']; ?></td>
                    </tr>
                    <tr>
                        <td>P ( arah angin = <?= $array['arahAngin']; ?> | hasil = yes )</td>
                        <td><?= $array['arahAngin_yes']; ?> / <?= $array['p_yes']; ?></td>
                        <td><?= $array['arahAngin_yes'] / $array['p_yes']; ?></td>
                    </tr>
                </tbody>
            </table>
            <table class="table table-bordered mt-3">
                <thead>
                    <tr>
                        <th scope="col" colspan="3">Hasil Probabilty No</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <tr>
                        <td>P ( No )</td>
                        <td><?= $array['p_no']; ?> / <?= $array['total']; ?></td>
                        <td><?= $array['p_no'] / $array['total']; ?></td>
                    </tr>
                    <tr>
                        <td>P ( cuaca = <?= $array['cuaca']; ?> | hasil = no )</td>
                        <td><?= $array['cuaca_no']; ?> / <?= $array['p_no']; ?></td>
                        <td><?= $array['cuaca_no'] / $array['p_no']; ?></td>
                    </tr>
                    <tr>
                        <td>P ( kecepatan angin = <?= $array['kecepatanAngin']; ?> | hasil = no )</td>
                        <td><?= $array['kecepatanAngin_no']; ?> / <?= $array['p_no']; ?></td>
                        <td><?= $array['kecepatanAngin_no'] / $array['p_no']; ?></td>
                    </tr>
                    <tr>
                        <td>P ( arah angin = <?= $array['arahAngin']; ?> | hasil = no )</td>
                        <td><?= $array['arahAngin_no']; ?> / <?= $array['p_no']; ?></td>
                        <td><?= $array['arahAngin_no'] / $array['p_no']; ?></td>
                    </tr>
                </tbody>
            </table>

            <table class="table table-bordered mt-3">
                <thead class="text-center">
                    <tr>
                        <th scope="col" colspan="2">P(X|C) P(C) or P(X|hasil=yes) P(hasil=yes)</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <tr>
                        <td>P ( X|hasil=yes ) P( hasil=yes )</td>
                        <td><?= ($array['cuaca_yes'] / $array['p_yes']) * ($array['kecepatanAngin_yes'] / $array['p_yes']) * ($array['arahAngin_yes'] / $array['p_yes']) * ($array['p_yes'] / $array['total']); ?></td>
                    </tr>
                    <tr>
                        <td>P( X|hasil=no ) P( hasil=no )</td>
                        <td><?= ($array['cuaca_no'] / $array['p_no']) * ($array['kecepatanAngin_no'] / $array['p_no']) * ($array['arahAngin_no'] / $array['p_no']) * ($array['p_no'] / $array['total']); ?></td>
                    </tr>
                </tbody>
            </table>

            <table class="table table-bordered mt-3">
                <thead class="text-center">
                    <tr>
                        <th scope="col" colspan="2">P(cuaca = <?= $array['cuaca']; ?>) * P(arah angin = <?= $array['arahAngin']; ?>) * P(kecepatan angin = <?= $array['kecepatanAngin']; ?>)</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <tr>
                        <td>P(x)</td>
                        <td><?= (($array['cuaca_yes'] + $array['cuaca_no']) / $array['total']) * (($array['arahAngin_yes'] + $array['arahAngin_no']) / $array['total']) * (($array['kecepatanAngin_yes'] + $array['kecepatanAngin_no']) / $array['total']); ?></td>
                    </tr>
                </tbody>
            </table>

            <table class="table table-bordered mt-3">
                <tbody class="text-center">
                    <tr>
                        <td>P(X|hasil=yes) P(hasil=yes) / p(x)</td>
                        <td><?= (($array['cuaca_yes'] / $array['p_yes']) * ($array['kecepatanAngin_yes'] / $array['p_yes']) * ($array['arahAngin_yes'] / $array['p_yes']) * ($array['p_yes'] / $array['total'])) / (($array['cuaca_yes'] + $array['cuaca_no']) / $array['total']) * (($array['arahAngin_yes'] + $array['arahAngin_no']) / $array['total']) * (($array['kecepatanAngin_yes'] + $array['kecepatanAngin_no']) / $array['total']); ?></td>
                    </tr>
                    <tr>
                        <td>P(X|hasil=no) P(hasil=no) / p(x)</td>
                        <td><?= (($array['cuaca_no'] / $array['p_no']) * ($array['kecepatanAngin_no'] / $array['p_no']) * ($array['arahAngin_no'] / $array['p_no']) * ($array['p_no'] / $array['total'])) / (($array['cuaca_yes'] + $array['cuaca_no']) / $array['total']) * (($array['arahAngin_yes'] + $array['arahAngin_no']) / $array['total']) * (($array['kecepatanAngin_yes'] + $array['kecepatanAngin_no']) / $array['total']); ?></td>
                    </tr>
                    <tr>
                        <td colspan="2">Note* jika (P(X|hasil=yes) P(hasil=yes) / p(x)) > (P(X|hasil=no) P(hasil=no) / p(x)) => Bagus untuk melakukan penangkapan udang. jika tidak pertanda tidak bagus.</td>
                    </tr>
                </tbody>
            </table>
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
                        <input type="text" name="jumlahTangkapan" class="form-control" id="hasil" aria-describedby="hasil" required>
                        <small id="hasil" class="form-text text-muted">Masukkan Hasil Tangkapan, Satuan KG. example = 0.2 kg untuk kecil dari 1 kg</small>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>