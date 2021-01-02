<?= $this->extend('template/pages'); ?>

<?= $this->section('data'); ?>

<div class="container">
    <div class="row">
        <div class="col-8">
            <h1>Tambah Data Mahasiswa</h1>
            <form action="/Mahasiswa/saveMahasiswa" method="POST">
                <?= csrf_field(); ?>
                <div class="mb-3">
                    <label for="nim" class="form-label">NIM</label>
                    <input type="text" class="form-control" name="nim" id="nim" placeholder="NIM" value="<?= old('nim'); ?>">
                    <p class="text-danger"><?= $validasi->getError('nim'); ?></p>
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?= old('nama'); ?>">
                    <p class="text-danger"><?= $validasi->getError('nama'); ?></p>
                </div>
                <div class="mb-3">
                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                    <input type="text" class="form-control" name="jenis_kelamin" id="jenis_kelamin" placeholder="Jenis Kelamin" value="<?= old('jenis_kelamin'); ?>">
                    <p class="text-danger"><?= $validasi->getError('jenis_kelamin'); ?></p>
                </div>
                <div class="mb-3">
                    <label for="jurusan" class="form-label">Jurusan</label>
                    <input type="text" class="form-control" name="jurusan" id="Jenis Kelamin" placeholder="jurusan" value="<?= old('jurusan'); ?>">
                    <p class="text-danger"><?= $validasi->getError('jurusan'); ?></p>
                </div>

                <button type="submit" name="submit" class="btn btn-primary">Tambah Data Mahasiswa</button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>