<?php 

class Mahasiswa_model {
    private $table = 'mahasiswa';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }
    
    public function getAllMahasiswa(){
        //query dari class Database
        $this->db->query('SELECT * FROM '.$this->table);
        //menampilkan semua datanya
        return $this->db->resultSet();
    }

    public function getMahasiswaById($id){
        $this->db->query('SELECT * FROM '.$this->table. ' WHERE id=:id');
        $this->db->bind('id',$id);
        return $this->db->single();
    }
}