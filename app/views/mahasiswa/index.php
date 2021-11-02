<div class="container mt-3">
    <div class="row">
      <div class="col-lg-6">
          <?php Flasher::flash() ?>
      </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#formModal">
            Tambah Data Mahasiswa
            </button>
            <h3>DAFTAR MAHASISWA</h3>
            <?php foreach($data['mhs'] as $mhs): ?>
            <ul class="list-group">
                <li class="list-group-item ">
                    <?= $mhs['nama']; ?>
                    <a  href="<?= BASEURL ?>/mahasiswa/hapus/<?= $mhs['id'] ?>" class="badge bg-danger float-end " onclick="return confirm('yakin');" style="text-decoration: none;">hapus</a>
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
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="sweetalert2.all.min.js"></script>
  <script>
    document.querySelector(".bisa").onclick = function() {myFunction()};

    function myFunction() {
      Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
          Swal.fire(
            'Deleted!',
            'Your file has been deleted.',
            'success'
          )
        }
    })
    }
    
  </script>
  