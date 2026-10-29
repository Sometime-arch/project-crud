<?php session_start(); ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Motor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <h1>Menu</h1>
    <ul>
        <li><a href="form.php">Form</a></li>
        <li><a href="data.php">Data</a></li>
    </ul>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-10 p-5 border bg-light">
                <h3 class="mb-4">Data Mahasiswa</h3>
                <table class="table table-striped table-hover table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama Mahasiswa</th>
                            <th>NIM</th>
                            <th>Alamat</th>
                            <th>No HP</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
    <?php 
    $koneksi = mysqli_connect('localhost', 'root', '', 'kampus');
    $query = "SELECT * FROM mahasiswa";
    $obj = mysqli_query($koneksi, $query);
    $dataArray = mysqli_fetch_all($obj, MYSQLI_ASSOC);
    $no = 1;

    foreach ($dataArray as $value) {
    ?>
    <tr>
        <td><?= $no++ ?></td>
        <td><?= $value['nama'] ?></td>
        <td><?= $value['nim'] ?></td>
        <td><?= $value['alamat'] ?></td>
        <td><?= $value['no_hp'] ?></td>
        <td>
            <form action="proses/delete_proses.php" method="post" style="display:inline;">
                <button onclick="return confirm('Yakin hapus?')" name="id_motor" value="<?= $value['id'] ?>" 
                
                type="submit" class="btn btn-danger btn-sm">Hapus</button>
            </form>
            <a href="edit.php?id=<?= $value['id'] ?>" class="btn btn-success btn-sm">Edit</a>
        </td>
    </tr>
    <?php } ?>
    <?php if (isset($_SESSION['pesan'])): ?>
    <div class="alert alert-<?= $_SESSION['warna'] ?> alert-dismissible fade show" role="alert">
        <strong></strong> <?= $_SESSION['pesan'] ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php 
    unset($_SESSION['pesan']); 
    unset($_SESSION['warna']);
endif; 
?>
</tbody>    
                </table>
            </div>
        </div>
    </div>
</body>
</html>
<?php
unset($_SESSION['err']);
unset($_SESSION['succ']);
?>