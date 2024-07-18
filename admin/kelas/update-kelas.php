<?php

//include koneksi database
include('../../koneksi.php');

//get data dari form
$id         = $_POST['id'];
$nama_kelas = $_POST['nama_kelas'];



//query update data ke dalam database berdasarkan ID
$query = "UPDATE tbl_kelas SET nama_kelas = '$nama_kelas' WHERE id = '$id'";

//kondisi pengecekan apakah data berhasil diupdate atau tidak
if($connection->query($query)) {
    //redirect ke halaman index.php 
    header("location: kelas.php");
} else {
    //pesan error gagal update data
    echo "Data Gagal Diupate!";
}

?>