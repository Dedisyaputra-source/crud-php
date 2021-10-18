<?php
require_once('connection.php');

$queryselect = "SELECT * FROM barang";

$result = mysqli_query($mysqli, $queryselect);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Data Barang</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#"><img src="logo.png" alt="" width="100"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Data Barang</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="row mt-3">
            <div class="col-md-6">
                <h3>Data Barang</h3>
            </div>
            <div class="col-md-2 ms-auto">
                <a href="form_tambah_data.php" class="btn btn-primary">Tambah Data</a>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row my-5">
            <div class="col-md-12">
                <table class="table">
                    <tbody>
                        <tr>
                            <th>No</th>
                            <th>Nomor Barang</th>
                            <th>Nama Barang</th>
                            <th>Stok</th>
                            <th>Harga </th>
                            <th>Aksi</th>
                        </tr>
                    </tbody>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($result as $barang) {
                            echo '
                            <tr>
                                <td>' . $i++ . '</td>
                                <td>' . $barang["no_barang"] . '</td>
                                <td>' . $barang["nama_barang"] . '</td>
                                <td>' . $barang["stok"] . '</td>
                                <td>' . $barang["harga"] . '</td>
                                <td>
                                    <a href="form_edit.php?no_barang=' . $barang['no_barang'] . '">Edit</a>
                                    <a href="delete.php?no_barang=' . $barang['no_barang'] . '" onclick= "return confirm_delete()">Hapus</a>
                                </td>
                            </tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        function confirm_delete() {
            return confirm("anda yakin");
        }
    </script>
</body>

</html>