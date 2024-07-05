<?php

//include koneksi database
include('../../koneksi.php');

//get data dari form
$id             = $_POST['id'];
$no_kartu       = $_POST['no_kartu'];
$nama_lengkap   = $_POST['nama_lengkap'];
$kelas_id       = $_POST['kelas_id'];
$jurusan_id     = $_POST['jurusan_id'];

//query update data ke dalam database berdasarkan ID
$query = "UPDATE tbl_siswa SET no_kartu = '$no_kartu', nama_lengkap = '$nama_lengkap', kelas_id = '$kelas_id', jurusan_id = '$jurusan_id' WHERE id = '$id'";

//kondisi pengecekan apakah data berhasil diupdate atau tidak
if($connection->query($query)) {
    //redirect ke halaman index.php 
    header("location: index.php");
} else {
    //pesan error gagal update data
    echo "Data Gagal Diupate!";
}

?>