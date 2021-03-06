<div class="container mt-3">
    <div class="row">
      <div class="col-lg-6">
          <?php Flasher::flash() ?>
      </div>
    </div>
    <!-- Button trigger modal -->
    <div class="row mb-3 ">
      <div class="col-lg-6">
        <button type="button" class="btn btn-primary  tombolTambah" data-bs-toggle="modal" data-bs-target="#formModal">
        Tambah Data Mahasiswa
        </button>
      </div>
    </div>
    <!-- search -->
    <div class="row mb-3 ">
      <div class="col-lg-6">
        <form action="<?= BASEURL;?>/mahasiswa/cari" method="POST">
          <div class="input-group ">
            <input type="text" class="form-control" placeholder="Cari Mahasiswa" name="keyword" id="keyword" autocomplete="off">
              <button class="btn btn-primary" type="submit" id="tombolCari">Cari</button>
          </div>
        </form>
      </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            
            <h3>DAFTAR MAHASISWA</h3>
            <?php foreach($data['mhs'] as $mhs): ?>
            <ul class="list-group">
                <li class="list-group-item ">
                    <?= $mhs['nama']; ?>
                    <a  href="<?= BASEURL ?>/mahasiswa/hapus/<?= $mhs['id'] ?>" class="badge bg-danger float-end " onclick="return confirm('yakin');" style="text-decoration: none;">hapus</a>
                    <a href="<?= BASEURL ?>/mahasiswa/edit/<?= $mhs['id'] ?>" class="badge bg-success float-end me-2 tampilModalUbah" style="text-decoration: none; " data-bs-toggle="modal" data-bs-target="#formModal" data-id="<?= $mhs['id'];?>">edit</a>
                    <a href="<?= BASEURL ?>/mahasiswa/detail/<?= $mhs['id'] ?>" class="badge bg-primary float-end me-2" style="text-decoration: none;">detail</a>
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
    <!-- input id dengan hidden -->
    <input type="hidden" name="id" id="id">
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
  
    
  
  