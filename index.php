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
    <title>Web Dinamis</title>
</head>

<body>
    <?php
    include_once("conect.php");
    $stock = mysqli_query($conn, "select * from tbstock");
    $sukses     = "";
    $error      = "";
    if (isset($_GET['op'])) {
        $op = $_GET['op'];
    } else {
        $op = "";
    }
    if ($op == 'delete') {
        $id         = $_GET['id'];
        $sql1       = "delete from tbstock where id = '$id'";
        $q1         = mysqli_query($conn, $sql1);
        if ($q1) {
            $sukses = "Berhasil hapus data";
            header("Location:index.php");
            // ob_end_flush();
        } else {
            $error  = "Gagal melakukan hapus data";
        }
    }
    ?>

    <div class="container">
        <header style="background-color: #fff" class="pt-3">
            <div class="container">
                <div class="header-center container-fluid ">
                    <nav class="navbar navbar-expand-lg navbar-light ">
                        <div class="container-fluid">
                            <div class="logo">
                                <p style="font-size: 26px">WEB DINAMIS</p>
                            </div>
                            <div class="d-flex">
                                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                    <li class="nav-item px-2">
                                        <a class="nav-link home active" href="index.php">STOCK</a>
                                    </li>
                                    <li class="nav-item px-2 ">
                                        <a class="nav-link home" href="pembelian.php">PEMBELIAN</a>
                                    </li>
                                    <li class="nav-item px-2">
                                        <a class="nav-link home" href="penjualan.php">PENJUALAN</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </header>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data Barang</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="updatestock.php" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="id" id="update_id">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Barang</label>
                            <input type="text" class="form-control" name="nama" id="nama">
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
                                            <select class="form-control" name="jenis" id="jenis">
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
                                <input type="number" class="form-control" name="jumlah" id="jumlah">
                            </div>
                        </div>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" name="editstock" class="btn btn-primary">Ubah Stock</button>
                    </div>
                    <div class="modal-footer">
                        
                    </div>
                </form>
            </div>
        </div>
    </div>
    <section class="container" style="min-width: 100%;">
        <div class="content row justify-content-md-center" style="margin-top: 100px;">
            <h3 CLASS="content row justify-content-md-center pb-2">Data Stock Barang</h3>
            <div class="card col-md-8">
                <div class="card-header">
                    <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        Tambah Data Stock
                    </button> -->
                    <a class="btn btn-primary" href="create_stock.php">
                        Tambah Data Stock
                    </a>
                </div>
                <?php
                if ($error) {
                ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $error ?>
                    </div>
                <?php
                    header("refresh:5;url=index.php"); //5 : detik
                }
                ?>
                <?php
                if ($sukses) {
                ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $sukses ?>
                    </div>
                <?php
                    header("refresh:5;url=index.php");
                }
                ?>
                <div class="card-body">
                    <div class="container">
                        <table id="data_table" class="table table-striped table-hover">
                            <thead align="center">
                                <tr>
                                    <th>Kode Barang</th>
                                    <th>Nama</th>
                                    <th>Jenis</th>
                                    <th>Jumlah Stock</th>
                                    <th style="width:20%;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $urut   = 1;
                                while ($data = mysqli_fetch_array($stock)) {
                                    $id         = $data['id'];
                                    $nama       = $data['nama'];
                                    $jenis      = $data['jenis'];
                                    $jumlah     = $data['jumlah'];
                                ?>
                                    <tr align="center">
                                        <td><?php echo $id ?></td>
                                        <td><?php echo $nama ?></td>
                                        <td><?php echo $jenis ?></td>
                                        <td><?php echo $jumlah ?></td>
                                        <td>
                                            <button type="button" data-bs-toggle="modal" data-bs-target="#editmodal" class="btn btn-warning editbtn" id="editstock">
                                                Edit
                                            </button>
                                            <a href="index.php?op=delete&id=<?php echo $id ?>" onclick="return confirm('Yakin mau delete data?')"><button type="button" class="btn btn-danger">Delete</button></a>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.js"></script>
    <script>
        $(function() {
            $('#data_table').DataTable()
        })
    </script>
    <script>
        $(document).ready(function() {

            $('.editbtn').on('click', function() {

                $('#editmodal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#update_id').val(data[0]);
                $('#nama').val(data[1]);
                $('#jenis').val(data[2]);
                $('#jumlah').val(data[3]);
            });
        });
    </script>
</body>

</html>