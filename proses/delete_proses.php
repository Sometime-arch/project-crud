<?php
// Koneksi ke database
$koneksi = mysqli_connect('localhost', 'root', '', 'kampus');

// Ambil ID dari form
$id = $_POST['id'];

// Ambil nama foto supaya bisa dihapus dari folder (Pake P besar sesuai DB kamu)
$cek = mysqli_query($koneksi, "SELECT kampus FROM mahasiswa WHERE id=$id");
$data = mysqli_fetch_array($cek);



// Hapus data di database
$query = "DELETE FROM mahasiswa WHERE id=$id";
mysqli_query($koneksi, $query);

// Balik ke halaman data
header("location:../data.php");
exit();
?>