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

    //menginsert data
    public function tambahDataMahasiswa($data){
        $query = "INSERT INTO mahasiswa VALUES('',:nama,:absen,:kelas,:jurusan)";
        $this->db->query($query);
        $this->db->bind('nama',$data['nama']);
        $this->db->bind('absen',$data['absen']);
        $this->db->bind('kelas',$data['kelas']);
        $this->db->bind('jurusan',$data['jurusan']);
        //eksekusi
        $this->db->execute();
        //menghitung jumlah data yg bertambah dan berkurang
        return $this->db->rowCount();
    }

    public function hapusDataMahasiswa($id){
        $query = "DELETE FROM mahasiswa WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id',$id);
        //eksekusi
        $this->db->execute();
        //menghitung jumlah data yg bertambah dan berkurang
        return $this->db->rowCount();                                    
    }
}