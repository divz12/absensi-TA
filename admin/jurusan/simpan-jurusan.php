<?php

//include koneksi database
include('../../koneksi.php');

//get data dari form
$nama_jurusan          = $_POST['nama_jurusan'];


    // Cek apakah no kartu sudah ada
    $sql_check = "SELECT * FROM tbl_jurusan WHERE nama_jurusan='$nama_jurusan'";
    $result_check = $connection->query($sql_check);

    if ($result_check->num_rows > 0) {
        echo "<script>alert('Nama jurusan sudah ada!!'); window.location='tambah-jurusan.php';</script>";
    } else {
//query insert data ke dalam database
$query = "INSERT INTO tbl_jurusan (nama_jurusan) VALUES ('$nama_jurusan')";

//kondisi pengecekan apakah data berhasil dimasukkan atau tidak
if($connection->query($query)) {

    //redirect ke halaman index.php 
    header("location: index.php");

} else {

    //pesan error gagal insert data
    echo "Data Gagal Disimpan!";

}
}

?>