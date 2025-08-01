<?php
$koneksi = mysqli_connect("localhost", "root", "", "website-profil-sekolah");
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
