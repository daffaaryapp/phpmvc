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
}