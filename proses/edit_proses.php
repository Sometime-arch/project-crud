
<?php
session_start();

$koneksi = mysqli_connect('localhost', 'root', '', 'kampus');

if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

// Ambil data dari form
$id      = $_POST['id'] ?? '';
$nim     = $_POST['nim'] ?? '';
$nama    = $_POST['nama'] ?? '';
$no_hp   = $_POST['no_hp'] ?? '';
$alamat  = $_POST['alamat'] ?? '';

// Validasi ID
if ($id === '' || !ctype_digit((string) $id)) {
    $_SESSION['pesan'] = "ID mahasiswa tidak valid!";
    $_SESSION['warna'] = "danger";
    header("Location: ../data.php");
    exit;
}

// Query update menggunakan prepared statement
$sql = "UPDATE mahasiswa
        SET nim = ?, nama = ?, no_hp = ?, alamat = ?
        WHERE id = ?";

$stmt = mysqli_prepare($koneksi, $sql);

if (!$stmt) {
    die("Query gagal disiapkan: " . mysqli_error($koneksi));
}

mysqli_stmt_bind_param(
    $stmt,
    "ssssi",
    $nim,
    $nama,
    $no_hp,
    $alamat,
    $id
);

if (mysqli_stmt_execute($stmt)) {
    $_SESSION['info'] = "Ubah";
    $_SESSION['pesan'] = "Data mahasiswa berhasil diubah!";
    $_SESSION['warna'] = "primary";
} else {
    $_SESSION['pesan'] = "Data gagal diubah: " . mysqli_stmt_error($stmt);
    $_SESSION['warna'] = "danger";
}

mysqli_stmt_close($stmt);
mysqli_close($koneksi);

header("Location: ../data.php");
exit;
