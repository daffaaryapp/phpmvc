<?php 
//jika tidak ada session maka jalankan
if(!session_id()) session_start();
require_once '../app/init.php';

$app = new App();