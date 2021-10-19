<?php 

class Mahasiswa_model {
    private $dbh; // database handler
    private $stmt; //statement 

    public function __construct()
    {
        //data source name / sumber database
        $dsn = 'mysql:host=localhost;dbname=phpmvc';
        
        try {
            $this->dbh = new PDO($dsn,'root','');
        //tangkap lalu masukan ke variabel e
        }catch(PDOException $e){
            //jika gagal matikan program dan kirim pesan
            die($e->getMessage());
        }
    }
    
    public function getAllMahasiswa(){
        $this->stmt = $this->dbh->prepare('SELECT * FROM mahasiswa');
        //stmt harus di eksekusi
        $this->stmt->execute();
        //mengembalikan data dalam bentuk array assosiasi
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}