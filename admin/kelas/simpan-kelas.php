<?php

//include koneksi database
include('../../koneksi.php');

//get data dari form
$nama_kelas          = $_POST['nama_kelas'];


    // Cek apakah no kartu sudah ada
    $sql_check = "SELECT * FROM tbl_kelas WHERE nama_kelas='$nama_kelas'";
    $result_check = $connection->query($sql_check);

    if ($result_check->num_rows > 0) {
        echo "<script>alert('Kelas sudah ada!!'); window.location='tambah-kelas.php';</script>";
    } else {
//query insert data ke dalam database
$query = "INSERT INTO tbl_kelas (nama_kelas) VALUES ('$nama_kelas')";

//kondisi pengecekan apakah data berhasil dimasukkan atau tidak
if($connection->query($query)) {

    //redirect ke halaman index.php 
    header("location: kelas.php");

} else {

    //pesan error gagal insert data
    echo "Data Gagal Disimpan!";

} 

}

?>