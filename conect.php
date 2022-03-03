<?php 
$servername = "localhost";
$username = "root";
$password = ""; 
$database =  "tugas_relasi";

$conn = mysqli_connect($servername, $username, $password, $database);

if(!$conn){
    die ("Koneksi Gagal");
}

?>