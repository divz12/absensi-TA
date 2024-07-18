
<?php

date_default_timezone_set('Asia/Jakarta');
echo date('Y-m-d H:i:s');


//include koneksi database
include('../../koneksi.php');

//get data dari form
$id    = $_POST['id'];


//query update data ke dalam database berdasarkan ID
$query = "UPDATE tbl_rekap SET keluar = NOW() WHERE id = '$id'";

//kondisi pengecekan apakah data berhasil diupdate atau tidak
if($connection->query($query)) {
    //redirect ke halaman index.php 
    header("location: absen.php");
} else {
    //pesan error gagal update data
    echo "Data Gagal Diupate!";
}

?>