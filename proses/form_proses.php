
<?php
session_start();

$koneksi = mysqli_connect('localhost', 'root', '', 'kampus');

$nama = $_POST['nama'];
$nim = $_POST['nim'];
$alamat = $_POST['alamat'];
$no_hp = $_POST['no_hp'];

$sql = "INSERT INTO mahasiswa (nama, nim, alamat, no_hp)
        VALUES ('$nama', '$nim', '$alamat', '$no_hp')";

if (mysqli_query($koneksi, $sql)) {
    $_SESSION['pesan'] = "Data Berhasil Ditambahkan!";
    $_SESSION['warna'] = "success";
} else {
    $_SESSION['pesan'] = "Data Gagal Ditambahkan!";
    $_SESSION['warna'] = "danger";
}

header("Location: ../data.php");
exit;
?>
