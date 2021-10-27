<div class="container mt-3">
    <div class="row">
        <div class="col-6">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#formModal">
            Tambah Data Mahasiswa
            </button>
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


<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="judulModal">Tambah Data Mahasiswa</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
    <!-- awal form -->
    <form action="<?= BASEURL?>/mahasiswa/tambah" method="post">
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" >
        </div>
        <div class="mb-3">
            <label for="absen" class="form-label">Absen</label>
            <input type="number" class="form-control" id="absen" name="absen" >
        </div>
        <div class="mb-3">
            <label for="kelas" class="form-label">Kelas</label>
            <input type="text" class="form-control" id="kelas" name="kelas" >
        </div>
        <div class="mb-3">
            <label for="jurusan" class="form-label">Jurusan</label>
            <select class="form-select" id="jurusan" name="jurusan">
                <option value="IPA">IPA</option>
                <option value="IPS">IPS</option>
            </select>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <!-- type harus submit agar bisa mengirimkan data -->
        <button type="submit" class="btn btn-primary">Tambah Data</button>
      </div>
    </form>
    <!-- akhir form -->
    </div>
  </div>