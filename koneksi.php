<?php
//koneksi ke database mysql,
    $koneksi = mysqli_connect("localhost","root","","perpustakaan");

    //cek jika koneksi ke mysql gagal, maka akan tampil pesan berikut
    if (!$koneksi){
        die("tidak bisa terkoneksi ke database" );
    }
?>
    