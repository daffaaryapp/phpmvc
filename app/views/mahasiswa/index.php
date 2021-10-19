<div class="container mt-5">
    <div class="row">
        <div class="col-6">
            <h3>DAFTAR MAHASISWA</h3>
            <?php foreach($data['mhs'] as $mhs): ?>
            <ul>
                <li><?= $mhs['nama']; ?></li>
                <li><?= $mhs['absen']; ?></li>
                <li><?= $mhs['kelas']; ?></li>
                <li><?= $mhs['jurusan']; ?></li>
            </ul>
            <?php endforeach; ?>
        </div>
    </div>
</div>