<?php 

class About extends Controller{
    public function index($nama = "Daffa" , $pekerjaan = "IT" , $umur = 17){
        //inisiasi data dengan array assosiatif
        $data['nama'] = $nama;
        $data['pekerjaan'] = $pekerjaan;
        $data['umur'] = $umur;
        $data['judul'] = 'About Index';
        
        //buka file melalui method view dan kirim data
        $this->view('templates/header',$data); 
        $this->view('about/index', $data);
        $this->view('templates/footer');
    }
    public function page(){
        $data['judul'] = 'About Page';
        //buka file melalui method view
        $this->view('templates/header',$data);
        $this->view('about/page');
        $this->view('templates/footer');
    }
}