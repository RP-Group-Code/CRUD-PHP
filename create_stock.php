<?php
ob_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="assets/css/style.css" />   -->
    <title>Create Stock</title>
</head>

<body>
    <?php
    include_once("conect.php");
    $nama = "";
    $jenis = "";
    $jumlah = "";
    $sukses     = "";
    $error      = "";
    ?>
    <div class="container">
        <div class="card mt-5">
            <div class="card-header">
                <h3>Tambah Data Barang</h3>
            </div>
            <?php
            if ($error) {
            ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?php echo $error ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" href="index.php">


                    </button>
                </div>
            <?php
            }
            ?>
            <?php
            if ($sukses) {
            ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?php echo $sukses ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" href="index.php">
                        <!-- <script type="text/javascript">
                                    location.reload();
                                </script> -->
                    </button>
                </div>
            <?php
                header("refresh:1.5;url=index.php");
            }
            ?>
            <div class="card-body">
                <form action="create_stock.php" method="post" name="form" enctype="multipart/form">
                    <div class="modal-body">
                        <form>
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama Barang</label>
                                <input type="text" class="form-control" name="nama">
                            </div>
                            <div class="row">
                                <!-- <div class="mb-3">
                                    <label for="jenis" class="form-label">jenis Barang</label>
                                    <input type="text" class="form-control" name="jenis">
                                </div> -->
                                <div class="mb-3 col-md-6">
                                    <label for="Jenis" class="form-label">Jenis</label>
                                    <form>
                                        <div class="row">
                                            <div class="form-group">
                                                <select class="form-control" name="jenis">
                                                    <option value="">- Pilih Jenis -</option>
                                                    <option value="PCS">PCS</option>
                                                    <option value="Lusin">Lusin</option>
                                                    <option value="Pack">Pack</option>
                                                    <option value="Dus">Dus</option>
                                                </select>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="Jumlah" class="form-label">Jumlah Stok</label>
                                    <input type="number" class="form-control" name="jumlah">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <a href="index.php" class="btn btn-secondary">
                                    kembali
                                </a>
                                <input type="submit" name="simpan" value="Add" class="btn btn-primary"></input>
                            </div>
                        </form>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.js"></script>

</html>

<?php


if (isset($_POST['simpan'])) {
    $nama = $_POST['nama'];
    $jenis = $_POST['jenis'];
    $jumlah = $_POST['jumlah'];

    if ($nama && $jenis && $jumlah) {
        $sql1   = "insert into tbstock (id,nama,jenis,jumlah) values ('NULL','$nama', '$jenis', '$jumlah')";
        $insert = mysqli_query($conn, $sql1);
        if ($insert) {
            $sukses     = "Berhasil memasukkan data baru";
            header("Location:index.php");
            ob_end_flush();
        } else {
            $error      = "Gagal memasukkan data";
        }
    } else {
        $eror = "Silahkan Masukan semua data";
    }
}
?>