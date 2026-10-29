<?php 
session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Form Insert Mahasiswa</title>
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
            <div class="col-5 p-5 border border-primary bg-light">
                <h3>Form Insert Mahasiswa</h3>
                
                <form action="proses/form_proses.php" method="post" enctype="multipart/form-data">
                    
                    <div class="form-group mb-2">
                        <label>Nama Mahasiswa</label>
                        <input type="text" name="nama" class="form-control <?= (isset($_SESSION['err']['nama'])?'is-invalid':null) ?>">
                        <div class="invalid-feedback">
                            <?= isset($_SESSION['err']['nama']) ? $_SESSION['err']['nama'] : '' ?>
                        </div>
                   </div>
                  

                    <div class="form-group mb-2">
                        <label>No HP</label>
                        <input type="text" name="no_hp" class="form-control <?= (isset($_SESSION['err']['no_hp'])?'is-invalid':null) ?>">
                        <div class="invalid-feedback">
                            <?= isset($_SESSION['err']['no_hp']) ? $_SESSION['err']['no_hp'] : '' ?>
                        </div>
                    </div>

                    <div class="form-group mb-2">
                        <label>NIM</label>
                        <input type="text" name="nim" class="form-control <?= (isset($_SESSION['err']['nim'])?'is-invalid':null) ?>">
                        <div class="invalid-feedback">
                            <?= isset($_SESSION['err']['nim']) ? $_SESSION['err']['nim'] : '' ?>
                        </div>
                        
                    </div>

                    <div class="form-group mb-2">
                        <label>Alamat</label>
                        <textarea name="alamat" class="form-control <?= (isset($_SESSION['err']['alamat'])?'is-invalid':null) ?>"></textarea>
                        <div class="invalid-feedback">
                            <?= isset($_SESSION['err']['alamat']) ? $_SESSION['err']['alamat'] : '' ?>
                        </div>
                    </div>

                    

                    <hr>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Simpan Data Mahasiswa</button>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>

    <?php
    unset($_SESSION['err']);
    ?>