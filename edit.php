
<?php
session_start();

$koneksi = mysqli_connect('localhost', 'root', '', 'kampus');

if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

$id = $_GET['id'] ?? '';

if ($id === '' || !ctype_digit((string) $id)) {
    header("Location: data.php");
    exit;
}

$sql = "SELECT id, nim, nama, no_hp, alamat
        FROM mahasiswa
        WHERE id = ?";

$stmt = mysqli_prepare($koneksi, $sql);
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);
$dtEdit = mysqli_fetch_assoc($result);

mysqli_stmt_close($stmt);
mysqli_close($koneksi);

if (!$dtEdit) {
    $_SESSION['pesan'] = "Data mahasiswa tidak ditemukan!";
    $_SESSION['warna'] = "danger";
    header("Location: data.php");
    exit;
}
?>
<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6 p-5 border border-primary bg-light rounded">
                <h3 class="mb-4">Form Edit Mahasiswa</h3>

                <form action="proses/edit_proses.php" method="POST">
                    <input type="hidden" name="id"
                           value="<?= htmlspecialchars((string) $dtEdit['id']) ?>">

                    <div class="mb-3">
                        <label for="nim" class="form-label">NIM</label>
                        <input type="text" id="nim" name="nim"
                               value="<?= htmlspecialchars($dtEdit['nim']) ?>"
                               class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Mahasiswa</label>
                        <input type="text" id="nama" name="nama"
                               value="<?= htmlspecialchars($dtEdit['nama']) ?>"
                               class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="no_hp" class="form-label">No. Handphone</label>
                        <input type="text" id="no_hp" name="no_hp"
                               value="<?= htmlspecialchars($dtEdit['no_hp']) ?>"
                               class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea id="alamat" name="alamat"
                                  class="form-control" required><?= htmlspecialchars($dtEdit['alamat']) ?></textarea>
                    </div>

                    <hr>

                    <button type="submit" class="btn btn-primary">
                        Simpan Perubahan
                    </button>

                    <a href="data.php" class="btn btn-secondary">
                        Batal
                    </a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
