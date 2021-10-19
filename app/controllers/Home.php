<?php 

class Home extends Controller {
    public function index(){
        $data['judul'] = 'Home Index';
        $data['nama'] = $this->model('User_model')->getUser();

        //tampilkan halaman
        $this->view('templates/header',$data);
        $this->view('home/index',$data);
        $this->view('templates/footer');
    }
}