<?php 

class Database {
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $db_name = DB_NAME;

    private $dbh;
    private $stmt;

    public function __construct()
    {
        //data source name / sumber database
        $dsn = 'mysql:host=' .$this->host. ';dbname=' .$this->db_name;
        //optimasi koneksi ke databse
        $option = [
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];

        
        try {
            $this->dbh = new PDO($dsn,$this->user,$this->pass,$option);
        //tangkap lalu masukan ke variabel e
        }catch(PDOException $e){
         //jika gagal matikan program dan kirim pesan
         die($e->getMessage());
        }
    }

    //untuk query
    public function query($query){
        //menyiapkan query
        $this->stmt = $this->dbh->prepare($query);
    }

    //di bind agar terhindar dari sql injection
    //dengan cara menghilangkan string di query mysql lalu mengeksekusinya
    public function bind($param,$value,$type=null){
        if(is_null($type)){
            switch(true){
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default :
                    $type = PDO::PARAM_STR;
            }
        }
        //di bind
        $this->stmt->bindValue($param,$value,$type);
    }

    public function execute(){
        $this->stmt->execute(); 
    }

    //mengembalikan banyak data
    public function resultSet(){
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    //mengembalikan satu data
    public function single(){
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function rowCount(){
        return $this->stmt->rowCount();
    }



}
