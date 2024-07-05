
<?php

date_default_timezone_set('Asia/Jakarta');
echo date('Y-m-d H:i:s');

$current_time = date('H:i:s');
$current_date = date('Y-m-d');

//include koneksi database
include('../../koneksi.php');

//get data dari form
$no_kartu    = $_POST['no_kartu'];

// Membaca status batas jam kerja dari file JSON
$file = '../../admin/absen/work_hours.json';
$enable_limit = false;
if (file_exists($file)) {
    $data = json_decode(file_get_contents($file), true);
    $enable_limit = $data['enable_limit'];
}

// Cek apakah batas jam diterapkan
if ($enable_limit && ($current_time < '15:00:00' || $current_time > '18:00:00')) {
    echo "<script>alert('Anda tidak dapat absen!!'); window.location='pulang.php';</script>";
    exit;
}


//query update data ke dalam database berdasarkan ID
$query = "UPDATE tbl_rekap SET keluar = NOW() WHERE no_kartu = '$no_kartu' AND tanggal = '$current_date'";

//kondisi pengecekan apakah data berhasil diupdate atau tidak
if($connection->query($query)) {
    //redirect ke halaman index.php 
    header("location: ../absen.php");
} else {
    //pesan error gagal update data
    echo "Data Gagal Diupate!";
}



?>