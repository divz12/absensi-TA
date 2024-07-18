<?php

include('../../koneksi.php');

//get id
$id = $_GET['id'];

$query = "DELETE FROM tbl_rekap WHERE id = '$id'";

if($connection->query($query)) {
    header("location: absen.php");
} else {
    echo "DATA GAGAL DIHAPUS!";
}

?>