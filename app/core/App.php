<?php 

class App {
    protected $controller = 'Home';
    protected $method = 'Index';
    protected $params = [];

    public function __construct()
    {
        $url = $this->parseURL();
        
        //controller
        if(isset($url[0])){
            if(file_exists('../app/controllers/'. $url[0] . '.php')){
                $this->controller = $url[0];
                unset($url[0]);
            }
        }
        //mengikutsertakan controller
        require_once '../app/controllers/'. $this->controller .'.php';
        //di instance agar dapat memasukkan method
        $this->controller = new $this->controller;

        //method 
        if(isset($url[1])){
            if(method_exists($this->controller , $url[1])){
            $this->method = $url[1];
            unset($url[1]);
            }
        }
        //params
        if(!empty($url)){
            $this->params = array_values($url);
            
        }

        //jalankan controller dan method, serta kirimkan params jika ada
        call_user_func_array([$this->controller,$this->method],$this->params); 
    }

    //memecah url menjadi sebuah array
    public function parseURL(){
        if(isset($_GET["url"])){
            $url = rtrim($_GET["url"] ,"/");
            $url = filter_var($url , FILTER_SANITIZE_URL);
            $url = explode("/",$url);
            return $url;
        }
    }
   
}