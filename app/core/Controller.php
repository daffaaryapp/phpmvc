<?php 

class Controller {
    //membuat method view
    public function view($view , $data = []){
        require_once '../app/views/'. $view .'.php';
    }
}