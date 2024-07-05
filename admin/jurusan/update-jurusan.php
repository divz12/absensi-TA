<?php

//include koneksi database
include('../../koneksi.php');

//get data dari form
$id                    = $_POST['id'];
$nama_jurusan          = $_POST['nama_jurusan'];



//query update data ke dalam database berdasarkan ID
$query = "UPDATE tbl_jurusan SET nama_jurusan = '$nama_jurusan' WHERE id = '$id'";

//kondisi pengecekan apakah data berhasil diupdate atau tidak
if($connection->query($query)) {
    //redirect ke halaman index.php 
    header("location: index.php");
} else {
    //pesan error gagal update data
    echo "Data Gagal Diupate!";
}

?>