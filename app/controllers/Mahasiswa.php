<?php 

class Mahasiswa extends Controller {
    public function index(){
        //input data judul
        $data['judul'] = "Mahasiswa index";
        //input data mahasiswa dari method model lalu mengambil data di Class Mahasiswa_model dengan bantuan method getAllMahasiswa()
        $data['mhs'] = $this->model('Mahasiswa_model')->getAllMahasiswa();

        //tampilkan halaman
        $this->view('templates/header',$data);
        $this->view('Mahasiswa/index',$data);
        $this->view('templates/footer');
    }
    
    //memasukkan param id karena di url mengirimkan param
    public function detail($id){
        //input data judul
        $data['judul'] = "Detail Mahasiswa";
        //input data mahasiswa dari method model lalu mengambil data di Class Mahasiswa_model dengan bantuan method getMahasiswaId($id) yg menggunakan params
        $data['mhs'] = $this->model('Mahasiswa_model')->getMahasiswaById($id);

        //tampilkan halaman
        $this->view('templates/header',$data);
        $this->view('Mahasiswa/detail',$data);
        $this->view('templates/footer');
    }

    public function tambah(){
        
        if($this->model('Mahasiswa_model')->tambahDataMahasiswa($_POST) > 0) {
            //jika berhasil kirimkan alert berhasil
            Flasher::setFlash($_POST['nama'],'berhasil','ditambah','success');
            //redirect ke halaman mahasiswa
            header('Location: '.BASEURL.'/mahasiswa');
            exit;
        }else {
            //jika gagal kirimkan alert gagal
            Flasher::setFlash($_POST['nama'],'gagal','ditambah','danger');
            //redirect ke halaman mahasiswa
            header('Location: '.BASEURL.'/mahasiswa');
            exit;
        }
    }

    public function hapus($id){
        //input data mahasiswa dari method model lalu mengambil data di Class Mahasiswa_model dengan bantuan method getMahasiswaId($id) yg menggunakan params
        $data['mhs'] = $this->model('Mahasiswa_model')->getMahasiswaById($id);

        if($this->model('Mahasiswa_model')->hapusDataMahasiswa($id) > 0) {
            //jika berhasil kirimkan alert berhasil
            Flasher::setFlash($data['mhs']['nama'],'berhasil','dihapus','success');
            //redirect ke halaman mahasiswa
            header('Location: '.BASEURL.'/mahasiswa');
            exit;
        }else {
            //jika gagal kirimkan alert gagal
            Flasher::setFlash($data['mhs']['nama'],'gagal','dihapus','danger');
            //redirect ke halaman mahasiswa
            header('Location: '.BASEURL.'/mahasiswa');
            exit;
        }
    }

    public function getUbah(){
        echo json_encode($this->model('Mahasiswa_model')->getMahasiswaById($_POST['id']));
    }

    public function edit(){
        if($this->model('Mahasiswa_model')->editDataMahasiswa($_POST) > 0) {
            //jika berhasil kirimkan alert berhasil
            Flasher::setFlash($_POST['nama'],'berhasil','diedit','success');
            //redirect ke halaman mahasiswa
            header('Location: '.BASEURL.'/mahasiswa');
            exit;
        }else {
            //jika gagal kirimkan alert gagal
            Flasher::setFlash($_POST['nama'],'gagal','diedit','danger');
            //redirect ke halaman mahasiswa
            header('Location: '.BASEURL.'/mahasiswa');
            exit;
        }
    }

    public function cari(){
        //input data judul
        $data['judul'] = "Mahasiswa index";
        //input data mahasiswa dari method model lalu mengambil data di Class Mahasiswa_model dengan bantuan method cariDataMahasiswa() utk search
        $data['mhs'] = $this->model('Mahasiswa_model')->cariDataMahasiswa();

        //tampilkan halaman
        $this->view('templates/header',$data);
        $this->view('Mahasiswa/index',$data);
        $this->view('templates/footer');
    }
}