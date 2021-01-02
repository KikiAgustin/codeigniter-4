<?php echo $this->extend('template/pages'); ?>


<?= $this->section('data'); ?>

<div class="container">
    <div class="row">
        <div class="col-12 mt-2 ">
            <h1>Data Mahasiswa</h1>
        </div>

        <div class="col-sm-8">

            <a href="/Mahasiswa/tambahData" class="btn btn-primary mt-2 mb-2">Tambah Data Mahasiswa</a>

            <?php if (session()->getFlashdata('pesan')) : ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong><?= session()->getFlashdata('pesan'); ?></strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>

            <!-- Tabel -->
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">NIM</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">Jurusan</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($mahasiswa as $mhs) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $mhs['nim']; ?></td>
                            <td><?= $mhs['nama']; ?></td>
                            <td><?= $mhs['jenis_kelamin']; ?></td>
                            <td><?= $mhs['jurusan']; ?></td>
                            <td>
                                <div class="dropdown">
                                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                        Aksi
                                    </a>

                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <li><a class="dropdown-item" href="/Mahasiswa/editData/<?= $mhs['id_mahasiswa']; ?>">Edit</a></li>
                                        <li><a class="dropdown-item" onclick="return confirm('Apakah anda yakin ingin menghapus data ini!!')" href="/Mahasiswa/deleteData/<?= $mhs['id_mahasiswa']; ?>">Delete</a></li>
                                    </ul>
                                </div>
                            </td>

                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>

        </div>

    </div>
</div>

<?= $this->endSection(); ?>