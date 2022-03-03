<?php 
include_once("conect.php");

if (isset($_POST['editstock'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $jenis = $_POST['jenis'];
    $jumlah = $_POST['jumlah'];

    if ($nama && $jenis && $jumlah) {
        $sql1 = "UPDATE tbstock SET nama='$nama',jenis = '$jenis',jumlah='$jumlah' WHERE id = '$id'";
        $update = mysqli_query($conn, $sql1);
        
        if ($update) {
            $sukses     = "Berhasil mengubah data baru";
            header("Location:index.php");
            ob_end_flush();
        } else {
            $error      = "Gagal mengubah data";
        }
    } 
}
?>