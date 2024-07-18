<?php

//include koneksi database
include('../../koneksi.php');

//get data dari form
$no_kartu       = $_POST['no_kartu'];
$nama_lengkap   = $_POST['nama_lengkap'];
$kelas_id       = $_POST['kelas_id'];
$jurusan_id     = $_POST['jurusan_id'];


    // Cek apakah no kartu sudah ada
    $sql_check = "SELECT * FROM tbl_siswa WHERE no_kartu='$no_kartu'";
    $result_check = $connection->query($sql_check);

    if ($result_check->num_rows > 0) {
        echo "<script>alert('Nomor kartu sudah ada!!'); window.location='tambah-siswa.php';</script>";
    } else {
//query insert data ke dalam database
$query = "INSERT INTO tbl_siswa (no_kartu, nama_lengkap, kelas_id, jurusan_id) VALUES ('$no_kartu', '$nama_lengkap', '$kelas_id', '$jurusan_id')";

//kondisi pengecekan apakah data berhasil dimasukkan atau tidak
if($connection->query($query)) {

    //redirect ke halaman index.php 
    header("location: siswa.php");

} else {

    //pesan error gagal insert data
    echo "Data Gagal Disimpan!";

}
    }
?>