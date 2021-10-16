<?php 

class Home extends Controller {
    public function Index(){
        $data['judul'] = 'Home Index';
        $this->view('templates/header',$data);
        $this->view('home/index');
        $this->view('templates/footer');
    }
}