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
    ?>

    <div class="container">
        <header style="background-color: #fff" class="pt-3">
            <div class="container">
                <div class=" header-center container-fluid ">
                    <nav class="navbar navbar-expand-lg navbar-light ">
                        <div class=" container-fluid ">
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
    <section class="container" style="min-width: 100%;">
        <div class="content row justify-content-md-center" style="margin-top: 100px;">
            <h3 CLASS="content row justify-content-md-center pb-2">PENJUALAN</h3>

            <div class="card col-md-8">
                <div class="card-header">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        Tambah Data Penjualan
                    </button>
                </div>
                <div class="card-body">
                    <div class="container">
                        <table id="data_table" class="table table-striped table-hover">
                            <thead align="center">
                                <tr>
                                    <th>ID</th>
                                    <th>Nama</th>
                                    <th>Jenis</th>
                                    <th>Jumlah Stock</th>
                                    <th style="width:20%;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($data = mysqli_fetch_array($stock)) {
                                    echo "
                                    <tr>
                                        <td>" . $data['id'] . "</td>
                                        <td>" . $data['nama'] . "</td>
                                        <td>" . $data['jenis'] . "</td>
                                        <td style='width: 15%;'>" . $data['jumlah'] . "</td>
                                        <td align='center'>
                                            <a href='' class='btn btn-warning'> EDIT</a>
                                            <a href='' class='btn btn-danger'> HAPUS</a>
                                        </td>
                                    </tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.js"></script>
    <script>
        $(function() {
            $('#data_table').DataTable()
        })
    </script>

</body>

</html>