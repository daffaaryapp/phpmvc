<?php 
//untuk memberikan alert
class Flasher {
    //membuat method alert dengan bantuam session
    public static function setFlash($pesan,$aksi,$tipe) {
        $_SESSION['flash'] = [
            'pesan'=> $pesan,
            'aksi' => $aksi,
            'tipe' => $tipe
        ];
    }
    //eksekusi
    public static function flash(){
        if(isset($_SESSION['flash'])){
            echo '<div class="alert alert-' .$_SESSION['flash']['tipe']. ' alert-dismissible fade show" role="alert">
                <strong>' .$_SESSION['flash']['pesan']. '</strong> ' .$_SESSION['flash']['aksi']. '
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                </button>
            </div>';
            unset($_SESSION['flash']);
        }
    }

}
