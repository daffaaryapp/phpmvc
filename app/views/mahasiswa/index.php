<div class="container mt-5">
    <div class="row">
        <div class="col-6">
            <h3>DAFTAR MAHASISWA</h3>
            <?php foreach($data['mhs'] as $mhs): ?>
            <ul class="list-group">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <?= $mhs['nama']; ?>
                    <a href="<?= BASEURL ?>/mahasiswa/detail/<?= $mhs['id'] ?>" class="badge bg-primary " style="text-decoration: none;">detail</a>
                </li>
            </ul>
            <?php endforeach; ?>
        </div>
    </div>
</div>