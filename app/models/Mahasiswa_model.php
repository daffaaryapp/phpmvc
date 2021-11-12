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
    //hapus
    public function hapusDataMahasiswa($id){
        $query = "DELETE FROM mahasiswa WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id',$id);
        //eksekusi
        $this->db->execute();
        //menghitung jumlah data yg bertambah dan berkurang
        return $this->db->rowCount();                                    
    }
    //edit
    public function editDataMahasiswa($data){
        $query = "UPDATE mahasiswa SET
                    nama = :nama,
                    absen = :absen,
                    kelas = :kelas,
                    jurusan = :jurusan
                    WHERE id = :id
                    ";
        $this->db->query($query);
        $this->db->bind('nama',$data['nama']);
        $this->db->bind('absen',$data['absen']);
        $this->db->bind('kelas',$data['kelas']);
        $this->db->bind('jurusan',$data['jurusan']);
        $this->db->bind('id',$data['id']);
        //eksekusi
        $this->db->execute();
        //menghitung jumlah data yg bertambah dan berkurang
        return $this->db->rowCount();
    }

    public function cariDataMahasiswa(){
        $keyword = $_POST['keyword'];
        $query = "SELECT * FROM mahasiswa WHERE nama LIKE :keyword";
        // cari data di database
        $this->db->query($query);
        $this->db->bind('keyword',"%$keyword%");
        //return dalam jumlah banyak
        return $this->db->resultSet();
    }
}